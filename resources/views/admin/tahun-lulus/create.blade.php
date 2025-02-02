@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Tahun Lulus</h1>

    <form action="{{ route('tahun-lulus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="text" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus') }}" required>
            @error('tahun_lulus')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tahun-lulus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
