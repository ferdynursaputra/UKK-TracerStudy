@extends('layouts.admin')

@section('content')

    <h1>Tambah Bidang Keahlian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bidang-keahlian.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_bidang_keahlian">Kode Bidang Keahlian</label>
            <input type="text" name="kode_bidang_keahlian" class="form-control" value="{{ old('kode_bidang_keahlian') }}" required>
        </div>
        <div class="form-group">
            <label for="bidang_keahlian">Nama Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" class="form-control mb-3" value="{{ old('bidang_keahlian') }}" required>
        </div>
        <button type="submit" class="btn btn-primary me-2">Simpan</button>
        <a href="{{ route('bidang-keahlian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
