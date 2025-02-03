<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Autentikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
        }
        .card-header {
            border-radius: 15px 15px 0 0;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px;
        }
        .btn {
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background-color: #198754;
            transform: translateY(-2px);
        }
        .btn-secondary:hover {
            background-color: #6c757d;
            transform: translateY(-2px);
        }
        .input-group-text {
            background-color: #e9ecef;
            border: none;
            border-radius: 10px 0 0 10px;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4><i class="bi bi-shield-lock me-2"></i> Ubah Autentikasi</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('alumni.autentikasiStore') }}" method="POST">
                            @csrf
                            
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" value="{{ Auth::guard('alumni')->user()->email }}" required>
                                </div>
                            </div>
                            
                            <!-- Password Baru -->
                            <div class="mb-4">
                                <label for="new_password" class="form-label fw-bold">Password Baru</label>
                                <div class="input-group ">
                                    <span class="input-group-text "><i class="bi bi-lock "></i></span>
                                    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Masukkan password baru" >
                                </div>
                                <small class="form-text text-muted">Minimal 8 karakter.</small>
                            </div>
                            
                            <!-- Konfirmasi Password Baru -->
                            <div class="mb-4">
                                <label for="new_password_confirmation" class="form-label fw-bold">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Konfirmasi password baru" >
                                </div>
                            </div>
                            
                            <!-- Tombol Submit -->
                            <div class="d-grid gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-check-circle me-2"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('alumni.dashboard') }}" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>