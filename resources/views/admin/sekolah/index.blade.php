@extends('layouts.admin2')
@section('title', 'Daftar Sekolah')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Sekolah</h1>
    <a href="{{ route('sekolah.create') }}" class="btn btn-primary mb-3">Tambah Sekolah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NPSN</th>
                <th>NSS</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Website</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekolah as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $s->npsn }}</td>
                <td>{{ $s->nss }}</td>
                <td>{{ $s->nama_sekolah }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->no_telp }}</td>
                <td>{{ $s->website }}</td>
                <td>{{ $s->email }}</td>
                <td>
                    {{-- <a href="{{ route('sekolah.show', $s->id_sekolah) }}" class="btn btn-info btn-sm">Detail</a> --}}
                    <a href="{{ route('sekolah.edit', $s->id_sekolah) }}" class="btn btn-warning btn-sm">Edit</a>
                    {{-- <form action="{{ route('sekolah.destroy', $s->id_sekolah) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
