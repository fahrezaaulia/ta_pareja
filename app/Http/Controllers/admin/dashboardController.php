<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $totalTamu = User::count();

        $totalUang = Tamu::sum('uang');

        // Alamat dari tabel tamus
        $addressesFromTamus = Tamu::select('users.alamat', \DB::raw('count(*) as count'))
            ->join('users', 'tamus.user_id', '=', 'users.id')
            ->groupBy('users.alamat')
            ->get();

        $tamusAddressLabels = $addressesFromTamus->pluck('alamat')->toArray();
        $tamusAddressCounts = $addressesFromTamus->pluck('count')->toArray();

        // Alamat dari tabel users
        $addressesFromUsers = User::select('alamat', \DB::raw('count(*) as count'))
            ->groupBy('alamat')
            ->get();

        $usersAddressLabels = $addressesFromUsers->pluck('alamat')->toArray();
        $usersAddressCounts = $addressesFromUsers->pluck('count')->toArray();

        return view('admin.dashboard.index', compact('totalTamu', 'totalUang', 'tamusAddressLabels', 'tamusAddressCounts', 'usersAddressLabels', 'usersAddressCounts'));
    }

    public function tamu()
    {
        $tamus = Tamu::with('user', 'statuses')->paginate(10);

        return view('admin.daftartamu.index', compact('tamus'));
    }

    public function daftartamu()
    {

        $tamus = Tamu::with('user')->get();
        return view('admin.tamu.index', compact('tamus'));
    }

    public function destroy($id)
    {
        $tamu = Tamu::find($id);
        if ($tamu) {
            $tamu->delete();
            return redirect()->route('dashboard.tamu')->with('success', 'Data tamu berhasil dihapus');
        }
        return redirect()->route('dashboard.tamu')->with('error', 'Data tamu tidak ditemukan');
    }
}
