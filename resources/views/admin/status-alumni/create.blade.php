@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Tambah Status Alumni</h1>
    <form action="{{ route('status-alumni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control mb-3" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('status-alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
    