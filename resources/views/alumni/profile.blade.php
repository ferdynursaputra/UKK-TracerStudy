<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2><i class="bi bi-person-circle"></i> Profil Alumni</h2>
        </div>

        <!-- Identitas -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Identitas</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->nama_depan }} {{ Auth::guard('alumni')->user()->nama_belakang }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">NISN</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->nisn }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">NIK</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->nik }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <p class="form-control-plaintext">
                            @if (Auth::guard('alumni')->user()->jenis_kelamin === 'L')
                                Laki-Laki
                            @elseif (Auth::guard('alumni')->user()->jenis_kelamin === 'P')
                                Perempuan
                            @else
                                Tidak Diketahui
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tempat Lahir</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->tempat_lahir }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->tgl_lahir ? date('d F Y', strtotime(Auth::guard('alumni')->user()->tgl_lahir)) : '' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Alamat</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->alamat }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">No HP</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->no_hp }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tahun Lulus</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->tahunLulus->tahun_lulus }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Konsentrasi Keahlian</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->konsentrasiKeahlian->konsentrasi_keahlian }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status Alumni</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->statusAlumni->status }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Akun Instagram</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->akun_ig }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Akun Facebook</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->akun_fb }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Akun TikTok</label>
                        <p class="form-control-plaintext">{{ Auth::guard('alumni')->user()->akun_tiktok }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tracer Kuliah -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tracer Kuliah</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($tracerKuliah)
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Kampus</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_kampus }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_status }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jenjang Pendidikan</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_jenjang }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jurusan</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_jurusan }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Linier dengan SMK</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_linier }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Alamat Kampus</label>
                            <p class="form-control-plaintext">{{ $tracerKuliah->tracer_kuliah_alamat }}</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="text-danger">Informasi tracer kuliah belum tersedia. Silakan lengkapi data Anda.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tracer Kerja -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tracer Kerja</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($tracerKerja)
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Pekerjaan</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_pekerjaan }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Tempat Kerja</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_nama }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jabatan</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_jabatan }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_status }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Lokasi</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_lokasi }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_alamat }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Mulai</label>
                            <p class="form-control-plaintext">{{ $tracerKerja->tracer_kerja_tgl_mulai ? date('d F Y', strtotime($tracerKerja->tracer_kerja_tgl_mulai)) : '' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Gaji</label>
                            <p class="form-control-plaintext">{{ 'Rp. ' . number_format($tracerKerja->tracer_kerja_gaji, 0, ',', '.') }}</p>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="text-danger">Informasi tracer kerja belum tersedia. Silakan lengkapi data Anda.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="text-center mt-4">
            <a href="{{ route('alumni.dashboard') }}" class="btn btn-secondary btn-lg px-5">Kembali</a>
            <a href="{{ route('alumni.profile.edit') }}" class="btn btn-secondary btn-lg px-5">Edit Profil</a>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
