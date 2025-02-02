<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tracer Study</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #344CB7;
        }

        footer {
            background-color: #344CB7;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #344CB7;
            box-shadow: 0 0 8px rgba(52, 76, 183, 0.2);
        }

        .btn-primary {
            background-color: #344CB7;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2a3d9b;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="text-white py-4">
        <div class="container">
            <h1 class="fs-3 fw-bold">Form Tracer Study</h1>
        </div>
    </header>

    <!-- Form Section -->
    <section id="form" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Form Tracer Study</h2>
                <p class="text-muted">Mohon lengkapi form di bawah ini untuk mendaftarkan akun alumni</p>
            </div>

            <div class="card mx-auto p-4" style="max-width: 800px;">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('frontend.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- Kolom 1 -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_tahun_lulus" class="form-label">Tahun Lulus</label>
                                <select name="id_tahun_lulus" id="id_tahun_lulus" class="form-select" required>
                                    <option value="">Pilih Tahun Lulus</option>
                                    @foreach ($tahunLulus as $tahun)
                                        <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
                                <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="form-select"
                                    required>
                                    <option value="">Pilih Konsentrasi Keahlian</option>
                                    @foreach ($konsentrasiKeahlian as $konsentrasi)
                                        <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">
                                            {{ $konsentrasi->konsentrasi_keahlian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_status_alumni" class="form-label">Status Alumni</label>
                                <select name="id_status_alumni" id="id_status_alumni" class="form-select" required>
                                    <option value="">Pilih Status Alumni</option>
                                    @foreach ($statusAlumni as $status)
                                        <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" name="nisn" id="nisn" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_depan" class="form-label">Nama Depan</label>
                                <input type="text" name="nama_depan" id="nama_depan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    required>
                            </div>
                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-md-6">


                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="akun_fb" class="form-label">Akun Facebook</label>
                                <input type="text" name="akun_fb" id="akun_fb" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="akun_ig" class="form-label">Akun Instagram</label>
                                <input type="text" name="akun_ig" id="akun_ig" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="akun_tiktok" class="form-label">Akun TikTok</label>
                                <input type="text" name="akun_tiktok" id="akun_tiktok" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit dan Kembali -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} SMK Antartika 1 SDA. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
