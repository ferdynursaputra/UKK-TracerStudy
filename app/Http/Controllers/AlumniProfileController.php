<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\TracerKerja;
use App\Models\StatusAlumni;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AlumniProfileController extends Controller
{
    public function index()
    {
        $id_alumni = Auth::guard('alumni')->user()->id_alumni;
        $tracerKuliah = TracerKuliah::where('id_alumni', $id_alumni)->first();
        // dd($tracerKuliah->tracer_kuliah_kampus);
        $tracerKerja = TracerKerja::where('id_alumni', $id_alumni)->get()->first();
        return view('alumni.profile', compact('tracerKuliah', 'tracerKerja'));
    }

    public function edit()
    {
        $alumni = Auth::guard('alumni')->user(); // Mendapatkan data alumni yang login
        $tahunLulus = TahunLulus::orderBy('tahun_lulus', 'asc')->get();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        // dd($alumni->tracerKuliah->tracer_kuliah_kampus);
        return view('alumni.edit-profile', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }
    // public function editTracerKuliah($id)
    // {
    //     $alumni = Auth::guard('alumni')->user(); // Mendapatkan data alumni yang login
    //     $tahunLulus = TahunLulus::orderBy('tahun_lulus', 'asc')->get();
    //     $konsentrasiKeahlian = KonsentrasiKeahlian::all();
    //     $statusAlumni = StatusAlumni::all();
    //     return view('alumni.edit-profile', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    // }

    public function update(Request $request)
    {

        $alumni = Alumni::findOrFail(Auth::guard('alumni')->user()->id_alumni);
        $tracerKuliah = TracerKuliah::where('id_tracer_kuliah', $request->id_tracer_kuliah)->first();
        $tracerKerja = TracerKerja::where('id_tracer_kerja', $request->id_tracer_kerja)->first();

        $rules = [
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'id_tahun_lulus' => ['required'],
            'id_konsentrasi_keahlian' => 'required',
            'id_status_alumni' => 'required',

            // tracer kuliah
            'tracer_kuliah_kampus' => '',
            'tracer_kuliah_status' => '',
            'tracer_kuliah_jenjang' => '',
            'tracer_kuliah_jurusan' => '',
            'tracer_kuliah_linier' => '',
            'tracer_kuliah_alamat' => '',

            // tracer kerja
            'tracer_kerja_pekerjaan' => '',
            'tracer_kerja_nama' => '',
            'tracer_kerja_jabatan' => '',
            'tracer_kerja_status' => '',
            'tracer_kerja_lokasi' => '',
            'tracer_kerja_alamat' => '',
            'tracer_kerja_tgl_mulai' => '',
            'tracer_kerja_gaji' => 'string|max:50',
        ];

        // Tambahkan validasi kondisional untuk email
        if ($request->email !== $alumni->email) {
            $rules['email'] = 'required|email|unique:tbl_alumni,email';
        }

        // Tambahkan validasi kondisional untuk nisn dan nik
        if ($request->nisn !== $alumni->nisn) {
            $rules['nisn'] = 'required|string|unique:tbl_alumni,nisn';
        }
        if ($request->nik !== $alumni->nik) {
            $rules['nik'] = 'required|string|unique:tbl_alumni,nik';
        }

        // $alumni = Auth::guard('alumni')->user();
        $validatedData = $request->validate($rules);
        $alumni->update($validatedData);
        if ($tracerKuliah) {
            $tracerKuliah->update($validatedData);
        }
        if ($tracerKerja) {
            $tracerKerja->update($validatedData);
        }

        return redirect()->route('alumni.profile')->with('success', 'Profil berhasil diperbarui!');
    }


}
