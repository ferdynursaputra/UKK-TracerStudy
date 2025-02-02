@extends('layouts.admin2')
@section('title', 'Testimoni')

@section('content')
<div class="container mt-4">
    <h1>Daftar Testimoni</h1>
    <a href="{{ route('testimoni.create') }}" class="btn btn-primary mb-3">Tambah Testimoni</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alumni</th>
                <th>Testimoni</th>
                <th>Tanggal Testimoni</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimoni as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                    <td>{{ $item->testimoni }}</td>
                    <td>{{ $item->tgl_testimoni}}</td>
                    <td>
                        <a href="{{ route('testimoni.edit', $item->id_testimoni) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('testimoni.destroy', $item->id_testimoni) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="return confirmDelete(this)">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection