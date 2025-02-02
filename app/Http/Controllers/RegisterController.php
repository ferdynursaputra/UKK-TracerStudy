<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Alumni;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins|unique:alumnis',
            'password' => 'required|string|confirmed|min:6',
            'email' => 'required|email|unique:admins|unique:alumnis',
        ]);

        $emailDomain = substr(strrchr($request->email, "@"), 1);

        if ($emailDomain === 'admin.example.com') {
            // Buat akun Admin
            Admin::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Akun admin berhasil dibuat!');
        } 
    }
}
