<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumni</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Dashboard Alumni</a>
            <div class="d-flex">
                <span class="text-white me-3">Logged in as:
                    <strong>{{ Auth::guard('alumni')->user()->nama_depan . ' ' . Auth::guard('alumni')->user()->nama_belakang }}</strong></span>
                <form id="logout-button" action="{{ route('alumni.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5 flex-grow-1">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5 text-center">
                <!-- Judul dengan efek gradient -->
                <h1 class="card-title display-4 fw-bold mb-4">
                    Selamat Datang,
                    <strong>{{ Auth::guard('alumni')->user()->nama_depan . ' ' . Auth::guard('alumni')->user()->nama_belakang }}</strong>
                </h1>
                <!-- Deskripsi -->
                <p class="lead text-muted mb-5">Terima kasih telah bergabung dengan komunitas alumni kami!</p>
                <!-- Tombol dengan ikon -->
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg px-4">
                        <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Beranda
                    </a>
                    <a href="{{ route('alumni.profile') }}" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-person-circle me-2"></i>Lihat Profil
                    </a>
                    <a href="{{ route('alumni.autentikasi') }}" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-shield-lock  me-2"></i>Ubah autentikasi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h2 class=" card-title fw-bold text-primary mb-4">
                    <i class="bi bi-mortarboard-fill me-2"></i>Tracer Kuliah
                </h2>
                @if (!$tracerKuliah)
                    <!-- Kondisi jika tracer kuliah belum diisi -->
                    <form action="{{ route('alumni.tracerKuliah.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="tracer_kuliah_kampus" class="form-label">Nama Kampus</label>
                                <input type="text" id="tracer_kuliah_kampus" name="tracer_kuliah_kampus"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kuliah_kampus }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kuliah_status" class="form-label">Status Kuliah</label>
                                <select id="tracer_kuliah_status" name="tracer_kuliah_status" class="form-select"
                                    required>
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

                            <div class="col-md-6">
                                <label for="tracer_kuliah_jenjang" class="form-label">Jenjang Pendidikan</label>
                                <input type="text" id="tracer_kuliah_jenjang" name="tracer_kuliah_jenjang"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kuliah_jenjang }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kuliah_jurusan" class="form-label">Jurusan</label>
                                <input type="text" id="tracer_kuliah_jurusan" name="tracer_kuliah_jurusan"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kuliah_jurusan }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kuliah_linier" class="form-label">Linier dengan SMK?</label>
                                <select id="tracer_kuliah_linier" name="tracer_kuliah_linier" class="form-select"
                                    required>
                                    <option value="1"
                                        {{ Auth::guard('alumni')->user()->tracer_kuliah_linier ? 'selected' : '' }}>Ya
                                    </option>
                                    <option value="0"
                                        {{ !Auth::guard('alumni')->user()->tracer_kuliah_linier ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="tracer_kuliah_alamat" class="form-label">Alamat Kampus</label>
                                <textarea id="tracer_kuliah_alamat" name="tracer_kuliah_alamat" class="form-control" rows="3" required>{{ Auth::guard('alumni')->user()->tracer_kuliah_alamat }}</textarea>
                            </div>

                            <div class="col-12 text-start">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-2"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-info text-center">
                        <p class="mb-0">Data tracer kuliah sudah diisi. Jika ingin mengubah, silakan edit di menu
                            profil.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h2 class="card-title fw-bold text-primary mb-4"><i class="bi bi-briefcase-fill me-2"></i>Tracer Kerja</h2>
                @if (!$tracerKerja)
                    <!-- Kondisi jika tracer kerja belum diisi -->
                    <form action="{{ route('alumni.tracerKerja.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="tracer_kerja_pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" id="tracer_kerja_pekerjaan" name="tracer_kerja_pekerjaan"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_pekerjaan }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_nama" class="form-label">Nama Tempat Kerja</label>
                                <input type="text" id="tracer_kerja_nama" name="tracer_kerja_nama"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_nama }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="tracer_kerja_jabatan" name="tracer_kerja_jabatan"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_jabatan }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_status" class="form-label">Status</label>
                                <input type="text" id="tracer_kerja_status" name="tracer_kerja_status"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_status }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_lokasi" class="form-label">Lokasi</label>
                                <input type="text" id="tracer_kerja_lokasi" name="tracer_kerja_lokasi"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_lokasi }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_tgl_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" id="tracer_kerja_tgl_mulai" name="tracer_kerja_tgl_mulai"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_tgl_mulai }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tracer_kerja_gaji" class="form-label">Gaji</label>
                                <input type="number" id="tracer_kerja_gaji" name="tracer_kerja_gaji"
                                    class="form-control"
                                    value="{{ Auth::guard('alumni')->user()->tracer_kerja_gaji }}" required>
                            </div>

                            <div class="col-12">
                                <label for="tracer_kerja_alamat" class="form-label">Alamat</label>
                                <textarea id="tracer_kerja_alamat" name="tracer_kerja_alamat" class="form-control" rows="3" required>{{ Auth::guard('alumni')->user()->tracer_kerja_alamat }}</textarea>
                            </div>

                            <div class="col-12 text-start">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-2"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-info text-center">
                        <p class="mb-0">Data tracer kerja sudah diisi. Jika ingin mengubah, silakan edit di menu
                            profil.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h2 class="card-title fw-bold text-primary mb-4">Tambah Testimoni</h2>
                <form action="{{ route('alumni.testimoni.store') }}" method="POST">
                    @csrf
                    <!-- Input Testimoni -->
                    <div class="mb-3">
                        <label for="testimoni" class="form-label fw-semibold">Testimoni Anda</label>
                        <textarea id="testimoni" name="testimoni" class="form-control" rows="5"
                            placeholder="Tulis testimoni Anda di sini..." required></textarea>
                    </div>
                    <!-- Tombol Kirim -->
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-2"></i>Kirim Testimoni
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h2 class="card-title fw-bold text-primary mb-4">Testimoni Alumni</h2>
                @foreach ($testimoni as $item)
                    <div class="mb-4 p-3 border rounded">
                        <!-- Isi Testimoni -->
                        <blockquote class="blockquote mb-2">
                            <p class="mb-0">{{ $item->testimoni }}</p>
                            <footer class="blockquote-footer mt-2">
                                <strong>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</strong>
                                <cite
                                    class="text-muted">({{ \Carbon\Carbon::parse($item->tgl_testimoni)->translatedFormat('d F Y') }})</cite>
                            </footer>
                        </blockquote>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('testimoni.destroy', $item->id_alumni) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="return confirmDelete(this)">
                                <i class="bi bi-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        <div class="container-fluid">
            <p class="mb-0">© 2025 Sistem Alumni. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap tombol logout
            const logoutButton = document.getElementById('logout-button');

            if (logoutButton) {
                logoutButton.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah aksi default (submit form)

                    // Tampilkan SweetAlert2
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda akan keluar dari sistem!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, logout!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika dikonfirmasi, submit form logout
                            document.getElementById('logout-button').submit();
                        }
                    });
                });
            }
        });


        // Fungsi untuk konfirmasi hapus
        function confirmDelete(event) { // Mencegah form submit langsung
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, submit form hapus
                    event.closest('form').submit();
                }
            });
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
