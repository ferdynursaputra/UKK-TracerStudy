@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Sekolah</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sekolah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="text" class="form-control" name="npsn" required>
        </div>
        <div class="mb-3">
            <label for="nss" class="form-label">NSS</label>
            <input type="text" class="form-control" name="nss" required>
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="no_telp">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" name="website">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
