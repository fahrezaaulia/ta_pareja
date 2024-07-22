<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class loginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek user berdasarkan nama dan password
        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Autentikasi user
            Auth::login($user);

            if ($user->role_id == Role::PEMILIK) {
                return redirect('/admin/dashboard');
            } elseif ($user->role_id == Role::TAMU) {
                return redirect('/home/dashboard');
            }
        } else {
            return back()->withErrors([
                'name' => 'Nama atau password salah.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
