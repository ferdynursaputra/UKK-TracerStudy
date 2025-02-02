<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TracerKuliah;
use App\Models\Alumni;

class TracerKuliahController extends Controller
{

    public function index()
    {
        $tracerKuliah = TracerKuliah::with('alumni')->get();
        return view('admin.tracer-kuliah.index', compact('tracerKuliah'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.tracer-kuliah.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|boolean',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        TracerKuliah::create($request->all());
        return redirect()->route('tracer-kuliah.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(TracerKuliah $tracerKuliah)
    {
        return view('admin.tracer-kuliah.show', compact('tracerKuliah'));
    }

    public function edit(TracerKuliah $tracerKuliah)
    {
        
        $alumni = Alumni::all();
        return view('admin.tracer-kuliah.edit', compact('tracerKuliah', 'alumni'));
    }

    public function update(Request $request, TracerKuliah $tracerKuliah)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|boolean',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        $tracerKuliah->update($request->all());

        return redirect()->route('tracer-kuliah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(TracerKuliah $tracerKuliah)
    {
        $tracerKuliah->delete();

        return redirect()->route('tracer-kuliah.index')->with('success', 'Data berhasil dihapus.');
    }
}
