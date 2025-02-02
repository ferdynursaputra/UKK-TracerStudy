<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        $data = ProgramKeahlian::all();
        return view('admin.program-keahlian.index', compact('data'));
    }

    public function create()
    {
        $bidangKeahlian = BidangKeahlian::all(); // Mengambil semua data bidang keahlian
        return view('admin.program-keahlian.create', compact('bidangKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required',
            'kode_program_keahlian' => 'required|max:10',
            'program_keahlian' => 'required|max:100',
        ]);

        ProgramKeahlian::create($request->all());
        return redirect()->route('program-keahlian.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(ProgramKeahlian $programKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::all(); // Mengambil semua data bidang keahlian
        return view('admin.program-keahlian.edit', compact('programKeahlian', 'bidangKeahlian'));
    }

    public function update(Request $request, ProgramKeahlian $programKeahlian)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required',
            'kode_program_keahlian' => 'required|max:10',
            'program_keahlian' => 'required|max:100',
        ]);

        $programKeahlian->update($request->all());
        return redirect()->route('program-keahlian.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(ProgramKeahlian $programKeahlian)
    {
        $programKeahlian->delete();
        return redirect()->route('program-keahlian.index')->with('success', 'Data berhasil dihapus');
    }
}

