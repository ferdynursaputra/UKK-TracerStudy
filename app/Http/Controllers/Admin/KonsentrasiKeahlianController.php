<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;

class konsentrasiKeahlianController extends Controller
{
    public function index()
    {
        $data = KonsentrasiKeahlian::all();
        return view('admin.konsentrasi-keahlian.index', compact('data'));
    }

    public function create()
    {
        $programKeahlian = ProgramKeahlian::all(); // Mengambil semua data konsentrasi keahlian
        return view('admin.konsentrasi-keahlian.create', compact('programKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_program_keahlian' => 'required',
            'kode_konsentrasi_keahlian' => 'required|max:10',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        KonsentrasiKeahlian::create($request->all());
        return redirect()->route('konsentrasi-keahlian.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $programKeahlian = ProgramKeahlian::all(); // Mengambil semua data program keahlian
        return view('admin.konsentrasi-keahlian.edit', compact('konsentrasiKeahlian', 'programKeahlian'));
    }

    public function update(Request $request, KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $request->validate([
            'id_program_keahlian' => 'required',
            'kode_konsentrasi_keahlian' => 'required|max:10',
            'konsentrasi_keahlian' => 'required|max:100',
        ]);

        $konsentrasiKeahlian->update($request->all());
        return redirect()->route('konsentrasi-keahlian.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(KonsentrasiKeahlian $konsentrasiKeahlian)
    {
        $konsentrasiKeahlian->delete();
        return redirect()->route('konsentrasi-keahlian.index')->with('success', 'Data berhasil dihapus');
    }
}

