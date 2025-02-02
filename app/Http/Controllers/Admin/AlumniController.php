<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        $data = Alumni::with(['tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'])->get();
        return view('admin.alumni.index', compact('data'));
    }

    public function create()
    {
        $tahunLulus = TahunLulus::orderBy('tahun_lulus', 'asc')->get();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('admin.alumni.create', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tahun_lulus' => 'required',
            'id_konsentrasi_keahlian' => 'required',
            'id_status_alumni' => 'required',
            'nisn' => 'required|max:20',
            'nik' => 'required|max:20',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'nullable|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'akun_fb' => 'nullable|max:50',
            'akun_ig' => 'nullable|max:50',
            'akun_tiktok' => 'nullable|max:50',
            'email' => 'required|email|unique:tbl_alumni,email',
            'password' => 'required|min:8',

        ]);


        $data = $request->all();
        $data['password'] = bcrypt($request->password); // Hash password

        Alumni::create($data);
        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');

    }

    

    public function show(Alumni $alumni)
    {
        return view('admin.alumni.show', compact('alumni'));

    }

    public function edit(Alumni $alumni)
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('admin.alumni.edit', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'id_tahun_lulus' => 'required',
            'id_konsentrasi_keahlian' => 'required',
            'id_status_alumni' => 'required',
            'nisn' => 'required|max:20',
            'nik' => 'required|max:20',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'nullable|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'akun_fb' => 'nullable|max:50',
            'akun_ig' => 'nullable|max:50',
            'akun_tiktok' => 'nullable|max:50',
            'email' => 'required|email|unique:tbl_alumni,email,' . $alumni->id_alumni . ',id_alumni',
            'password' => 'nullable|min:8',
        ]);

        $data = $request->all();
        if ($request->password) {
            $data['password'] = bcrypt($request->password); // Update password if provided
        } else {
            unset($data['password']);
        }

        $alumni->update($data);
        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy($alumni)
    {
        $alumni = Alumni::find($alumni);
        $alumni->delete();
        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

}
