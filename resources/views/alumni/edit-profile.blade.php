<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <!-- Alert jika ada pesan -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card untuk Identitas -->
        <form action="{{ route('alumni.profile.update') }}" method="POST">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Identitas</h2>

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input type="text" name="nama_depan" id="nama_depan" class="form-control"
                            value="{{ old('nama_depan', $alumni->nama_depan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control"
                            value="{{ old('nama_belakang', $alumni->nama_belakang) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $alumni->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control"
                            value="{{ old('nisn', $alumni->nisn) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control"
                            value="{{ old('nik', $alumni->nik) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="L"
                                {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P"
                                {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                            value="{{ old('tgl_lahir', $alumni->tgl_lahir) }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $alumni->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control"
                            value="{{ old('no_hp', $alumni->no_hp) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_tahun_lulus" class="form-label">Tahun Lulus</label>
                        <select name="id_tahun_lulus" id="id_tahun_lulus" class="form-control" required>
                            @foreach ($tahunLulus as $tahun)
                                <option value="{{ $tahun->id_tahun_lulus }}"
                                    {{ old('id_tahun_lulus', $alumni->tahunLulus->tahun_lulus) == $tahun->tahun_lulus ? 'selected' : '' }}>
                                    {{ $tahun->tahun_lulus }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
                        <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="form-control"
                            required>
                            @foreach ($konsentrasiKeahlian as $konsentrasi)
                                <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}"
                                    {{ old('id_konsentrasi_keahlian', $alumni->konsentrasiKeahlian->konsentrasi_keahlian) == $konsentrasi->konsentrasi_keahlian ? 'selected' : '' }}>
                                    {{ $konsentrasi->konsentrasi_keahlian }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_status_alumni" class="form-label">Status Alumni</label>
                        <select name="id_status_alumni" id="id_status_alumni" class="form-control" required>
                            @foreach ($statusAlumni as $status)
                                <option value="{{ $status->id_status_alumni }}"
                                    {{ old('id_status_alumni', $alumni->statusAlumni->status) == $status->status ? 'selected' : '' }}>
                                    {{ $status->status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="akun_ig" class="form-label">Akun Instagram</label>
                        <input type="text" name="akun_ig" id="akun_ig" class="form-control"
                            value="{{ old('akun_ig', $alumni->akun_ig) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="akun_fb" class="form-label">Akun Facebook</label>
                        <input type="text" name="akun_fb" id="akun_fb" class="form-control"
                            value="{{ old('akun_fb', $alumni->akun_fb) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="akun_tiktok" class="form-label">Akun TikTok</label>
                        <input type="text" name="akun_tiktok" id="akun_tiktok" class="form-control"
                            value="{{ old('akun_tiktok', $alumni->akun_tiktok) }}" required>
                    </div>

                </div>
            </div>

            <!-- Card untuk Tracer Kuliah -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Tracer Kuliah</h2>

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_tracer_kuliah"
                        value="{{ $alumni->tracerKuliah->id_tracer_kuliah }}">
                    <div class="mb-3">
                        <label for="tracer_kuliah_kampus" class="form-label">Nama Kampus</label>
                        <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus"
                            class="form-control"
                            value="{{ old('tracer_kuliah_kampus', $alumni->tracerKuliah->tracer_kuliah_kampus) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kuliah_status" class="form-label">Status Kuliah</label>
                        <select id="tracer_kuliah_status" name="tracer_kuliah_status" class="form-select" required>
                            <option value="Aktif"
                                {{ Auth::guard('alumni')->user()->tracer_kuliah_status == 'Aktif' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="Lulus"
                                {{ Auth::guard('alumni')->user()->tracer_kuliah_status == 'Lulus' ? 'selected' : '' }}>
                                Lulus</option>
                            <option value="Drop Out"
                                {{ Auth::guard('alumni')->user()->tracer_kuliah_status == 'Drop Out' ? 'selected' : '' }}>
                                Drop Out</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kuliah_jenjang" class="form-label">Jenjang Pendidikan</label>
                        <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang"
                            class="form-control"
                            value="{{ old('tracer_kuliah_jenjang', $alumni->tracerKuliah->tracer_kuliah_jenjang) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kuliah_jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan"
                            class="form-control"
                            value="{{ old('tracer_kuliah_jurusan', $alumni->tracerKuliah->tracer_kuliah_jurusan) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kuliah_linier" class="form-label">Linier dengan SMK</label>
                        <select id="tracer_kuliah_linier" name="tracer_kuliah_linier" class="form-select" required>
                            <option value="1"
                                {{ Auth::guard('alumni')->user()->tracer_kuliah_linier ? 'selected' : '' }}>Ya</option>
                            <option value="0"
                                {{ !Auth::guard('alumni')->user()->tracer_kuliah_linier ? 'selected' : '' }}>Tidak
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kuliah_alamat" class="form-label">Alamat kampus</label>
                        <textarea name="tracer_kuliah_alamat" id="tracer_kuliah_alamat" class="form-control" rows="3">{{ old('tracer_kuliah_alamat', $alumni->tracerKuliah->tracer_kuliah_alamat) }}</textarea>
                    </div>

                </div>
            </div>

            <!-- Card untuk Tracer Kerja -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Tracer Kerja</h2>

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_tracer_kerja"
                        value="{{ $alumni->tracerKerja->id_tracer_kerja }}">
                    <div class="mb-3">
                        <label for="tracer_kerja_pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan"
                            class="form-control"
                            value="{{ old('tracer_kerja_pekerjaan', $alumni->tracerKerja->tracer_kerja_pekerjaan) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_nama" class="form-label">Nama Tempat Kerja</label>
                        <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" class="form-control"
                            value="{{ old('tracer_kerja_nama', $alumni->tracerKerja->tracer_kerja_nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan"
                            class="form-control"
                            value="{{ old('tracer_kerja_jabatan', $alumni->tracerKerja->tracer_kerja_jabatan) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_status" class="form-label">Status</label>
                        <input type="text" name="tracer_kerja_status" id="tracer_kerja_status"
                            class="form-control"
                            value="{{ old('tracer_kerja_status', $alumni->tracerKerja->tracer_kerja_status) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi"
                            class="form-control"
                            value="{{ old('tracer_kerja_lokasi', $alumni->tracerKerja->tracer_kerja_lokasi) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_alamat" class="form-label">Alamat</label>
                        <textarea name="tracer_kerja_alamat" id="tracer_kerja_alamat" class="form-control" rows="3">{{ old('tracer_kerja_alamat', $alumni->tracerKerja->tracer_kerja_alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_tgl_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai"
                            class="form-control"
                            value="{{ old('tracer_kerja_tgl_mulai', $alumni->tracerKerja->tracer_kerja_tgl_mulai) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tracer_kerja_gaji" class="form-label">Gaji</label>
                        <input type="number" name="tracer_kerja_gaji" id="tracer_kerja_gaji" class="form-control"
                            value="{{ old('tracer_kerja_gaji', $alumni->tracerKerja->tracer_kerja_gaji) }}" required>
                    </div>

                </div>
            </div>

            <!-- Tombol Kembali dan Simpan Perubahan -->
            <div class="text-center mt-4">
                <a href="{{ route('alumni.profile') }}" class="btn btn-secondary btn-lg px-5">Kembali</a>
                <button type="submit" class="btn btn-primary btn-lg px-4">Simpan Perubahan</button>
            </div>
        </form>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
