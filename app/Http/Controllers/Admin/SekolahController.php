<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    // Menampilkan daftar sekolah
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolah'));
    }

    // Menampilkan form tambah sekolah
    public function create()
    {
        return view('admin.sekolah.create');
    }

    // Menyimpan data sekolah baru
    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required|unique:tbl_sekolah,npsn',
            'nss' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'nullable',
            'website' => 'nullable',
            'email' => 'nullable|email'
        ]);

        Sekolah::create($request->all());

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    // Menampilkan detail sekolah
    public function show($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('admin.sekolah.show', compact('sekolah'));
    }

    // Menampilkan form edit sekolah
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    // Memperbarui data sekolah
    public function update(Request $request, $id)
    {
        $request->validate([
            'npsn' => 'required|unique:tbl_sekolah,npsn,'.$id.',id_sekolah',
            'nss' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required|max:255',
            'no_telp' => 'nullable',
            'website' => 'nullable',
            'email' => 'nullable|email' 
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($request->all());

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }

    // Menghapus sekolah
    public function destroy($id)
    {
        Sekolah::findOrFail($id)->delete();
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dihapus.');
    }
}
