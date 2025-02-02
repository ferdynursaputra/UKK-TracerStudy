@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Sekolah</h1>

    <form action="{{ route('sekolah.update', $sekolah->id_sekolah) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="text" class="form-control" name="npsn" value="{{ $sekolah->npsn }}" required>
        </div>
        <div class="mb-3">
            <label for="nss" class="form-label">NSS</label>
            <input type="text" class="form-control" name="nss" value="{{ $sekolah->nss }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah" value="{{ $sekolah->nama_sekolah }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" required>{{ $sekolah->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="no_telp" value="{{ $sekolah->no_telp }}">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" name="website" value="{{ $sekolah->website }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $sekolah->email }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
