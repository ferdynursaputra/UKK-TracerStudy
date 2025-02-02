<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusAlumni;
use App\Models\Alumni;
use Illuminate\Http\Request;

class StatusAlumniController extends Controller
{

    public function index()
    {
        $data = StatusAlumni::all();
        return view('admin.status-alumni.index', compact('data'));
    }

    public function create()
    {
        return view('admin.status-alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|max:25',
        ]);

        StatusAlumni::create($request->all());
        return redirect()->route('status-alumni.index')->with('success', 'Status alumni berhasil ditambahkan.');
    }

    public function edit( $statusAlumni)
    {
        $statusAlumni = StatusAlumni::find($statusAlumni);
        return view('admin.status-alumni.edit', compact('statusAlumni'));
    }

    public function update(Request $request, StatusAlumni $statusAlumni)
    {
        $request->validate([
            'status' => 'required|max:25',
        ]);

        $statusAlumni->update($request->all());
        return redirect()->route('status-alumni.index')->with('success', 'Status alumni berhasil diperbarui.');
    }

    public function destroy($statusAlumni)
    {
        $existingStatusAlumni = Alumni::where('id_status_alumni', $statusAlumni)->first();
        if ($existingStatusAlumni) {
            return redirect()->route('status-alumni.index')->with('error', 'Data tidak dapat dihapus karena masih digunakan');
        }
        $statusAlumni = StatusAlumni::find($statusAlumni);
        $statusAlumni->delete();
        return redirect()->route('status-alumni.index')->with('success', 'Data berhasil dihapus');
    }
}
