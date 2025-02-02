<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('/gambar/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Header Section */
        header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            padding: 1.5rem 0;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: center;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav a {
            color: #333;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        nav a:hover,
        nav a.active {
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }

        nav form button {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;

            border: none;
            border-radius: 20px;
            background: none;
            cursor: pointer;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        nav form button:hover {
            color: rgb(255, 255, 255);
            background-color: #007bff;
            border-radius: 20px;
        }


        /* Main Section */
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            text-align: center;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        button:active {
            transform: translateY(0);
        }

        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Wrapper untuk tata letak */
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Konten utama */
        .content {
            flex: 1;
            /* Membuat bagian konten fleksibel untuk memenuhi ruang */
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            text-align: center;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #333;
            color: white;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Header -->
        <header style="font-size: 1.5rem">
            @yield('title')
        </header>

        <!-- Navigation Bar -->
        <nav>
            <a class="{{ request()->is('admin/dashboard') ? '' : '' }}" href="dashboard">Beranda</a>
            <a class="{{ request()->is('admin/bidang-keahlian') ? 'active' : '' }}" href="bidang-keahlian">Bidang
                Keahlian</a>
            <a class="{{ request()->is('admin/program-keahlian') ? 'active' : '' }}" href="program-keahlian">Program
                Keahlian</a>
            <a class="{{ request()->is('admin/konsentrasi-keahlian') ? 'active' : '' }}"
                href="konsentrasi-keahlian">Konsentrasi Keahlian</a>
            <a class="{{ request()->is('admin/tahun-lulus') ? 'active' : '' }}" href="tahun-lulus">Tahun Lulus</a>
            <a class="{{ request()->is('admin/alumni') ? 'active' : '' }}" href="alumni">Alumni</a>
            <a class="{{ request()->is('admin/tracer-kuliah') ? 'active' : '' }}" href="tracer-kuliah">Tracer Kuliah</a>
            <a class="{{ request()->is('admin/tracer-kerja') ? 'active' : '' }}" href="tracer-kerja">Tracer Kerja</a>
            <a class="{{ request()->is('admin/status-alumni') ? 'active' : '' }}" href="status-alumni">Status Alumni</a>
            <a class="{{ request()->is('admin/testimoni') ? 'active' : '' }}" href="testimoni">Testimoni</a>
            <a class="{{ request()->is('admin/sekolah') ? 'active' : '' }}" href="sekolah">Sekolah</a>
            <form id="logout-button" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        </nav>

        <!-- Main Content -->
        <main class="content w-100 "style="max-width: 100%;">
            <div class="container">
                <div class="card p-4">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white py-3">
            &copy; 2025 Admin Dashboard. Developed by Admin
        </footer>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tangkap tombol logout
            const logoutButton = document.getElementById('logout-button');
    
            if (logoutButton) {
                logoutButton.addEventListener('click', function (e) {
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
