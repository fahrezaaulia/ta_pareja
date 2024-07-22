<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class registerController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru dengan role tamu
        $user = new User;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->role_id = Role::TAMU;
        $user->save();

        return redirect()->route('register')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
