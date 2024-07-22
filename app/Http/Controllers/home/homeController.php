<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Status;
use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class homeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function home()
    {
        return view('home.home');
    }

    public function dashboard()
    {
        return view('home.dashboard');
    }

    public function profil()
    {
        return view('home.profil');
    }

    public function tamu(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $users = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->paginate(5);
        } else {
            $users = User::paginate(5);
        }

        return view('home.tamu', compact('users'));
    }

    public function bayar()
    {
        return view('home.pembayaran');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'harga' => 'required|numeric|min:1000',
            'status_info' => 'required|array',
            'status_info.*' => 'required|string|in:Bayar,Buwuh',
            'catatan' => 'nullable|array',
            'catatan.*' => 'nullable|string|max:255',
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $user = Auth::user();

        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid(),
                'gross_amount' => $request->input('harga'),
            ),
            'customer_details' => array(
                'first_name' => $user->name,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        // Save the transaction to the database
        $tamu = new Tamu();
        $tamu->user_id = $user->id;
        $tamu->uang = $request->input('harga');
        $tamu->status = 'Success';
        $tamu->snap_token = $snapToken;
        $tamu->order_id = $params['transaction_details']['order_id'];
        $tamu->payment_method = 'midtrans';
        $tamu->account_number = '';
        $tamu->save();

        foreach ($request->input('status_info') as $index => $status) {
            $catatan = $request->input('catatan')[$index] ?? '';
            $statusModel = new Status();
            $statusModel->tamu_id = $tamu->id;
            $statusModel->status = $status;
            $statusModel->catatan = $catatan;
            $statusModel->save();
        }

        return view('home.payment', ['snapToken' => $snapToken]);
    }

    public function handleNotification(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        // Find the transaction record from the database
        $tamu = Tamu::where('order_id', $orderId)->first();

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $tamu->status = 'challenge';
                    session()->flash('notification', 'Pembayaran Anda sedang dalam pengecekan.');
                } else {
                    $tamu->status = 'success';
                    session()->flash('notification', 'Pembayaran Anda berhasil.');
                }
            }
        } elseif ($transaction == 'settlement') {
            $tamu->status = 'success';
            session()->flash('notification', 'Pembayaran Anda berhasil.');
        } elseif ($transaction == 'pending') {
            $tamu->status = 'pending';
            session()->flash('notification', 'Pembayaran Anda tertunda.');
        } elseif ($transaction == 'deny') {
            $tamu->status = 'failed';
            session()->flash('notification', 'Pembayaran Anda ditolak.');
        } elseif ($transaction == 'expire') {
            $tamu->status = 'failed';
            session()->flash('notification', 'Pembayaran Anda kadaluarsa.');
        } elseif ($transaction == 'cancel') {
            $tamu->status = 'failed';
            session()->flash('notification', 'Pembayaran Anda dibatalkan.');
        }

        $tamu->save();

        return response()->json(['status' => 'success']);
    }

    public function historyTransaction()
    {
        $user = Auth::user();
        $transactions = Tamu::where('user_id', $user->id)->paginate(10);

        return view('home.historytransaction', compact('transactions'));
    }
}
