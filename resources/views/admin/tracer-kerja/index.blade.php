@extends('layouts.admin2')
@section('title', 'Tracer Kerja')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Tracer Kerja</h1>
                <a href="{{ route('tracer-kerja.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alumni</th>
                            <th>Pekerjaan</th>
                            <th>Nama Tempat Kerja</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracerKerja as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                                <td>{{ $item->tracer_kerja_pekerjaan }}</td>
                                <td>{{ $item->tracer_kerja_nama }}</td>
                                <td>{{ $item->tracer_kerja_jabatan }}</td>
                                <td>{{ $item->tracer_kerja_status }}</td>
                                <td>
                                    {{-- <a href="{{ route('tracer-kerja.edit', $item->id_tracer_kerja) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                    <a href="{{ route('tracer-kerja.show', $item->id_tracer_kerja) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <form action="{{ route('tracer-kerja.destroy', $item->id_tracer_kerja) }}" method="POST"
                                        class="d-inline">
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
        </div>
    </div>
@endsection
