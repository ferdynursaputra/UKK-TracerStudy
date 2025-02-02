<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{

    public function index()
    {
        $testimoni = Testimoni::with('alumni')->get();
        return view('admin.testimoni.index', compact('testimoni'));
    }
    public function indexAlumni()
    {
        $testimoni = Testimoni::with('alumni')->where('id_alumni', Auth::guard('alumni')->user()->id_alumni)->get();
        return view('alumni.dashboard', compact('testimoni'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.testimoni.create', compact('alumni'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required|string|max:500',
            'tgl_testimoni' => 'required|date',
        ]);

        Testimoni::create([
            'id_alumni' => Auth::guard('alumni')->user()->id, // Mengambil ID alumni yang sedang login
            'testimoni' => $request->input('testimoni'),
            'tgl_testimoni' => now(), // Menambahkan tanggal testimoni secara otomatis
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }
    public function storeAlumni(Request $request)
    {

        $request->validate([
            'testimoni' => 'required|string|max:500',
        ]);

        Testimoni::create([
            'id_alumni' => Auth::guard('alumni')->user()->id_alumni, // Mengambil ID alumni yang sedang login
            'testimoni' => $request->input('testimoni'),
            'tgl_testimoni' => now(), // Menambahkan tanggal testimoni secara otomatis
        ]);

        return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function show(Testimoni $testimoni)
    {
        return view('admin.testimoni.show', compact('testimoni'));
    }

    public function edit(Testimoni $testimoni)
    {
        $alumni = Alumni::all();
        return view('admin.testimoni.edit', compact('testimoni', 'alumni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required|string|max:500',
            'tgl_testimoni' => 'required|date',
        ]);

        $testimoni->update($request->all());

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
    public function dashboard()
    {
        $testimoni = Testimoni::with('alumni')->get(); // Menampilkan testimoni beserta informasi alumni yang menulis
        return view('dashboard', compact('testimoni'));
    }

    public function destroyTestimoniDashboard($id_alumni)
    {

        $testimoni = Testimoni::where('id_alumni', $id_alumni)->first();
        if (!$testimoni) {
            return redirect()->route('alumni.dashboard')->with('error', 'Testimoni tidak ditemukan.');
        }
        // Hapus testimoni
        $testimoni->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('alumni.dashboard')->with('success', 'Testimoni berhasil dihapus.');
    }

}
