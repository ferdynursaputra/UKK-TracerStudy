@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>Tambah Testimoni</h4>
    <form action="{{ route('testimoni.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_alumni" class="form-label">Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-select">
                <option value="">Pilih Alumni</option>
                @foreach ($alumni as $item)
                    <option value="{{ $item->id_alumni }}">{{ $item->nama_depan }} {{ $item->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="testimoni" class="form-label">Testimoni</label>
            <textarea name="testimoni" id="testimoni" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="tgl_testimoni" class="form-label">Tanggal Testimoni</label>
            <input type="date" name="tgl_testimoni" id="tgl_testimoni" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
