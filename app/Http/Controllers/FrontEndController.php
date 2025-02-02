<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Sekolah;
use App\Models\Testimoni;
use App\Models\TahunLulus;
use App\Models\TracerKerja;
use App\Models\StatusAlumni;
use App\Models\TracerKuliah;
use Hash;
use Illuminate\Http\Request;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        $sekolah = Sekolah::first();
        $tahunLulus = TahunLulus::orderBy('tahun_lulus', 'asc')->get();


        // Ambil parameter filter dari request
        $filterTahun = $request->get('tahun_lulus');
        // Query Testimoni dengan pengkondisian filter
        $testimoni = Testimoni::when($filterTahun, function ($query, $filterTahun) {
            $query->whereHas('alumni.tahunLulus', function ($query) use ($filterTahun) {
                $query->where('tahun_lulus', $filterTahun);
            });
        })->get();

        return view('frontend.home', compact('testimoni', 'tahunLulus', 'filterTahun', 'sekolah'));
    }

    public function dashboard(Request $request)
    {
        $id_alumni = Auth::guard('alumni')->user()->id_alumni;
        $tracerKuliah = TracerKuliah::where('id_alumni', $id_alumni)->get()->first();
        $tracerKerja = TracerKerja::where('id_alumni', $id_alumni)->get()->first();
        $testimoni = Testimoni::with('alumni')->where('id_alumni', $id_alumni)->get();

        // Ambil daftar tahun lulus unik
        $tahunLulus = Alumni::distinct()->pluck('id_tahun_lulus');


        // Ambil parameter filter dari request
        $filterTahun = $request->get('tahun_lulus');
        // Query testimoni dengan filter
        $testimoniQuery = Testimoni::with('alumni')->where('id_alumni', $id_alumni);
        if ($filterTahun) {
            $testimoniQuery->whereHas('alumni', function ($query) use ($filterTahun) {
                $query->where('tahun_lulus', $filterTahun);
            });
        }
        $testimoni = $testimoniQuery->get();

        return view('alumni.dashboard', compact('tracerKuliah', 'tracerKerja', 'testimoni', 'tahunLulus', 'filterTahun'));
    }

    public function create()
    {
        $tahunLulus = TahunLulus::orderBy('tahun_lulus', 'asc')->get();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('frontend.daftar', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
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

        $request->status_login = '0';

        $data = $request->all();
        $data['password'] = bcrypt($request->password); // Hash password

        Alumni::create($data);
        return redirect()->route('home')->with('success', 'Data alumni berhasil ditambahkan.');

    }

    public function createTracerKuliah()
    {
        $alumni = Alumni::all();
        return view('alumni.dashboard.create', compact('alumni'));
    }

    public function storeTracerKuliah(Request $request)
    {
        $request->validate([
            // 'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|boolean',
            'tracer_kuliah_alamat' => 'nullable|string|max:45',
        ]);

        $alumni = Auth::guard('alumni')->user();

        TracerKuliah::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kuliah_kampus' => $request->input('tracer_kuliah_kampus'),
            'tracer_kuliah_status' => $request->input('tracer_kuliah_status'),
            'tracer_kuliah_jenjang' => $request->input('tracer_kuliah_jenjang'),
            'tracer_kuliah_jurusan' => $request->input('tracer_kuliah_jurusan'),
            'tracer_kuliah_linier' => $request->input('tracer_kuliah_linier'),
            'tracer_kuliah_alamat' => $request->input('tracer_kuliah_alamat'),
        ]);
        return redirect()->route('alumni.dashboard')->with('success', 'Tracer kuliah berhasil diperbarui.');
    }

    public function storeTracerKerja(Request $request)
    {
        $request->validate([
            // 'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'nullable|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable|numeric',
        ]);

        $alumni = Auth::guard('alumni')->user();

        TracerKerja::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kerja_pekerjaan' => $request->input('tracer_kerja_pekerjaan'),
            'tracer_kerja_nama' => $request->input('tracer_kerja_nama'),
            'tracer_kerja_jabatan' => $request->input('tracer_kerja_jabatan'),
            'tracer_kerja_status' => $request->input('tracer_kerja_status'),
            'tracer_kerja_lokasi' => $request->input('tracer_kerja_lokasi'),
            'tracer_kerja_alamat' => $request->input('tracer_kerja_alamat'),
            'tracer_kerja_tgl_mulai' => $request->input('tracer_kerja_tgl_mulai'),
            'tracer_kerja_gaji' => $request->input('tracer_kerja_gaji'),
        ]);
        return redirect()->route('alumni.dashboard')->with('success', 'Tracer Kerja berhasil diperbarui.');
    }

    public function autentikasi()
    {
        return view('alumni.autentikasi');
    }
    
    public function autentikasiStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|confirmed:new_password',
        ]);
        

        if (Auth::guard('alumni')->user()->update(['email' => $request->email, 'password' => Hash::make($request->new_password)])) {
            return redirect()->route('alumni.dashboard');
        } else {
            return redirect()->route('alumni.autentikasi')->with('error', 'Email atau password salah.');
        }
    }
}
