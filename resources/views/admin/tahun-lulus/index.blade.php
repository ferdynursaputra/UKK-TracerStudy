@extends('layouts.admin2')
@section('title', 'Tahun Lulus')

@section('content')
    <div class="container mt-3">
        <h1>Data Tahun Lulus</h1>
        <a href="{{ route('tahun-lulus.create') }}" class="btn btn-primary mb-3">Tambah Tahun Lulus</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive" style="max-height: 300px">
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Lulus</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $tahunLulus)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tahunLulus->tahun_lulus }}</td>
                            <td>{{ $tahunLulus->keterangan }}</td>
                            <td>
                                <a href="{{ route('tahun-lulus.edit', $tahunLulus->id_tahun_lulus) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tahun-lulus.destroy', $tahunLulus->id_tahun_lulus) }}"
                                    method="POST" class="d-inline" onclick="return confirmDelete(this)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
