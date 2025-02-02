@extends('layouts.admin2')
@section('title', 'Alumni')

@section('content')
    <div class="container mt-4">
        <h1>Data Alumni</h1>
        <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3">Tambah Alumni</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Konsentrasi Keahlian</th>
                    <th>Status Alumni</th>
                    <th>Status Login</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $alumni)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alumni->nisn }}</td>
                        <td>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</td>
                        <td>{{ $alumni->tahunLulus->tahun_lulus }}</td>
                        <td>{{ $alumni->konsentrasiKeahlian->konsentrasi_keahlian }}</td>
                        <td>{{ $alumni->statusAlumni->status }}</td>
                        <td>
                            @if ($alumni->status_login == 1)
                                <span class="badge text-bg-success">Aktif</span>
                            @else
                                <span class="badge text-bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('alumni.show', $alumni->id_alumni) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('alumni.edit', $alumni->id_alumni) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('alumni.destroy', $alumni->id_alumni) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirmDelete(this)">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
