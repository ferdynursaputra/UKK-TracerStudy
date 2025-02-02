<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TracerKerja;
use App\Models\Alumni;

class TracerKerjaController extends Controller
{

    public function index()
    {
        $tracerKerja = TracerKerja::with('alumni')->get();
        return view('admin.tracer-kerja.index', compact('tracerKerja'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.tracer-kerja.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|numeric',
        ]);

        TracerKerja::create($request->all());

        return redirect()->route('tracer-kerja.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(TracerKerja $tracerKerja)
    {
        return view('admin.tracer-kerja.show', compact('tracerKerja'));
    }

    public function edit(TracerKerja $tracerKerja)
    {
        $alumni = Alumni::all();
        return view('admin.tracer-kerja.edit', compact('tracerKerja', 'alumni'));
    }

    public function update(Request $request, TracerKerja $tracerKerja)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|numeric',
        ]);

        $tracerKerja->update($request->all());

        return redirect()->route('tracer-kerja.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(TracerKerja $tracerKerja)
    {
        $tracerKerja->delete();

        return redirect()->route('tracer-kerja.index')->with('success', 'Data berhasil dihapus.');
    }
}
