<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        return view('admin.dashboard');  // Pastikan Anda memiliki view 'admin.dashboard'
    }
}
