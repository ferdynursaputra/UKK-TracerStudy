<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study - Sekolah Anda</title>
    <link rel="shortcut icon" href="{{ asset('/gambar/logo.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body style="background-color: #f8f9fa;">

    <!-- Header Section -->
    <header class="text-white py-3 position-sticky top-0 bg-primary shadow" style="z-index: 999;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo / Title -->
            <h1 class="fs-4 fw-bold m-0">Tracer Study</h1>

            <!-- Navigation -->
            <nav>
                <ul class="nav align-items-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link text-white">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link text-white">Contact</a>
                    </li>

                    <!-- Cek apakah alumni sudah login -->
                    @if (Auth::guard('alumni')->check())
                        <!-- Jika sudah login, tampilkan nama alumni dan dropdown -->
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('alumni')->user()->nama_depan . ' ' . Auth::guard('alumni')->user()->nama_belakang ?? '' }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('alumni.dashboard') }}">Dashboard</a></li>
                                <li>
                                    <form id="logout-button" action="{{ route('alumni.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Jika belum login, tampilkan tombol Daftar dan Login -->
                        <li class="nav-item ms-3">
                            <a href="{{ route('frontend.daftar') }}" class="btn btn-dark px-4 py-2">Daftar</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a href="{{ route('alumni.login') }}" class="btn btn-dark px-4 py-2">Login</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>





    <!-- About Section -->
    <section id="home" class="text-white py-5 h-screen" style="background-color: #577BC1">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold">Selamat datang di Tracer Study {{ $sekolah->nama_sekolah ?? 'Sekolah Anda' }}</h1>
                    <p style="font-size: 18px">Tracer Study di aplikasi sekolah kami bertujuan untuk mengumpulkan
                        masukan berharga dari alumni mengenai pengalaman pendidikan mereka dan dampaknya terhadap dunia
                        kerja. Dengan fitur ini, alumni dapat memberikan informasi tentang relevansi kurikulum,
                        keterampilan yang diperoleh, dan kepuasan mereka terhadap pembelajaran yang diterima.</p>
                </div>
                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="{{ asset('/gambar/ilustri.png') }}" alt="Ilustrasi Tracer Study"
                        class="img-fluid rounded ms-5 px-5 ">
                </div>

            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="about" class="py-5">
        <div class="container d-flex align-items-center justify-content-center text-center flex-lg-row flex-column">
            <div class="col-lg-6 me-lg-5 ">
                <img src="{{ asset('/gambar/ilustri1.png') }}" alt="Tracer Study" class="img-fluid px-5">
            </div>
            <div class="col-lg-6 mt-lg-0 mt-4 text-lg-start" style="font-size: 19px">
                <h2 class="fw-bold text-dark">Apa Itu Tracer Study?</h2>
                <p class="mt-3">

                    Tracer Study adalah metode penelitian yang digunakan untuk melacak perkembangan lulusan setelah
                    menyelesaikan pendidikan. Penelitian ini bertujuan untuk mengetahui sejauh mana lulusan beradaptasi
                    dengan dunia kerja, melanjutkan pendidikan, atau berkontribusi dalam masyarakat.
                </p>
                <p>
                    Tracer Study biasanya dilakukan oleh institusi pendidikan untuk mengumpulkan data tentang karier
                    lulusan, relevansi pekerjaan dengan bidang studi, serta tingkat kepuasan mereka terhadap pengalaman
                    pendidikan. Hasil penelitian ini berguna untuk mengevaluasi kurikulum, meningkatkan kualitas
                    pendidikan, dan menunjukkan keberhasilan alumni. Penelitian ini sering dilakukan melalui survei atau
                    kuesioner yang diberikan kepada lulusan setelah mereka lulus.
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Testimoni Alumni</h2>

            <!-- Dropdown Filter Tahun Lulus -->
            <form method="GET" action="{{ route('home') }}" class="mb-4 text-center">
                <label for="tahun_lulus" class="form-label fw-semibold">Filter berdasarkan Tahun Lulus:</label>
                <select name="tahun_lulus" id="tahun_lulus" class="form-select w-auto d-inline-block mx-2">
                    <option value="">Semua Tahun</option>
                    @foreach ($tahunLulus as $tahun)
                        <option value="{{ $tahun->tahun_lulus }}"
                            {{ $filterTahun == $tahun->tahun_lulus ? 'selected' : '' }}>
                            {{ $tahun->tahun_lulus }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <!-- List Testimoni -->
            <div class="row justify-content-center">
                @if ($testimoni->isNotEmpty())
                    @foreach ($testimoni as $testi)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <blockquote class="blockquote mb-3">
                                        <p>"{{ $testi->testimoni }}"</p>
                                    </blockquote>
                                    <footer class="blockquote-footer">
                                        <strong>{{ $testi->alumni->nama_depan . ' ' . $testi->alumni->nama_belakang ?? 'Anonim' }}</strong>
                                        <cite class="text-muted">({{ $testi->created_at->format('d M Y') }})</cite>
                                    </footer>
                                    <p>Alumni Tahun Lulus: {{ $testi->alumni->tahunLulus->tahun_lulus ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Belum ada testimoni yang tersedia untuk tahun ini.</p>
                @endif
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="text-black py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk menghubungi kami.</p>

            <!-- Email Button -->
            <a href="mailto:tracerstudy@sekolah.com" class="btn btn-primary text-white fw-semibold mb-4">Email Kami</a>

            <!-- Contact Form -->
            <div class="mt-5">
                <h5>Atau Kirim Pesan Melalui Formulir Berikut:</h5>
                <form action="/submit-contact" method="post" class="mt-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>

        
    </section>

    <!-- Footer -->
    <footer class="text-white py-5" style="background-color: #344CB7;">
        <div class="container">
            <div class="row">
                <!-- Bagian Alamat dan Kontak -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Alamat:</h5>
                    <p class="mb-2">{{$sekolah->alamat}}</p>
                    <p><strong>Telepon: </strong>{{$sekolah->no_telp}}</p>
                    <p><strong>Website: </strong>{{$sekolah->website}}</p>
                    <p><strong>Email: </strong>{{$sekolah->email}}</p>
                </div>

                <!-- Bagian Media Sosial -->
                <div class="col-md-4 mb-4 text-center">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div class="d-flex justify-content-center">
                        <!-- Ikon YouTube -->
                        <a href="https://www.youtube.com/@smkantartika1sidoarjo726" class="text-decoration-none me-3" target="_blank">
                            <i class="bi bi-youtube fs-2 text-danger"></i> <!-- Ikon YouTube -->
                        </a>
                        <!-- Ikon TikTok -->
                        <a href="https://www.tiktok.com/@smkantartika1sda" class="text-decoration-none me-3" target="_blank">
                            <i class="bi bi-tiktok fs-2 text-black"></i> <!-- Ikon TikTok -->
                        </a>
                        <!-- Ikon Instagram -->
                        <a href="https://www.instagram.com/smkantartika1sda/" class="text-decoration-none" target="_blank">
                            <i class="bi bi-instagram fs-2 text-black"></i> <!-- Ikon Instagram -->
                        </a>
                    </div>
                </div>

                <!-- Bagian Hak Cipta -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Tentang Kami</h5>
                    <p class="mb-2">{{$sekolah->nama_sekolah}} adalah sekolah kejuruan yang berkomitmen untuk menghasilkan lulusan berkualitas.</p>
                    <p class="mb-0">&copy; {{ date('Y') }} SMK Antartika 1 SDA. All Rights Reserved.</p>
                </div>
            </div>
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
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
