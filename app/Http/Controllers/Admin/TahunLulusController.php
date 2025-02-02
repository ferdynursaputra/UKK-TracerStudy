<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    public function index()
    {
        $data = TahunLulus::orderBy('tahun_lulus', 'asc')->get();
        return view('admin.tahun-lulus.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tahun-lulus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_lulus' => 'required|max:10',
            'keterangan' => 'nullable|max:50',
        ]);

        TahunLulus::create($request->all());
        return redirect()->route('tahun-lulus.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahunLulus)
    {

        $tahunLulus = TahunLulus::find($tahunLulus);
        return view('admin.tahun-lulus.edit', compact('tahunLulus'));
    }


    public function update(Request $request, TahunLulus $tahunLulus)
    {
        $request->validate([
            'tahun_lulus' => 'required|max:10',
            'keterangan' => 'nullable|max:50',
        ]);

        $tahunLulus->update($request->all());
        return redirect()->route('tahun-lulus.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($tahunLulus)
    {

        $existingTahunLulus = Alumni::where('id_tahun_lulus', $tahunLulus)->first();
        if ($existingTahunLulus) {
            return redirect()->route('tahun-lulus.index')->with('error', 'Data tidak dapat dihapus karena masih digunakan');
        }
        $tahunLulus = TahunLulus::find($tahunLulus);
        $tahunLulus->delete();
        return redirect()->route('tahun-lulus.index')->with('success', 'Data berhasil dihapus');

    }
}

