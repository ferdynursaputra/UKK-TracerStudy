<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;

class AlumniLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('alumni.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('alumni')->attempt($request->only('email', 'password'))) {
            Auth::guard('alumni')->user()->update(['status_login' => '1']); // Update status_login
            return redirect()->route('home')->with('success', 'Berhasil login.'); // Redirect ke home
        }
    
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('alumni')->user()->update(['status_login' => '0']); // Update status_login
        Auth::guard('alumni')->logout();
        return redirect()->route('home')->with('success', 'Anda telah logout.');
    }
}
