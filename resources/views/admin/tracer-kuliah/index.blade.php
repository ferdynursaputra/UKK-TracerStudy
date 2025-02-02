@extends('layouts.admin2')
@section('title', 'Tracer Kuliah')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Tracer Kuliah</h1>
                <a href="{{ route('tracer-kuliah.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alumni</th>
                            <th>Kampus</th>
                            <th>Status</th>
                            <th>Jenjang</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracerKuliah as $index => $tracer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tracer->alumni->nama_depan }} {{ $tracer->alumni->nama_belakang }}</td>
                                <td>{{ $tracer->tracer_kuliah_kampus }}</td>
                                <td>{{ $tracer->tracer_kuliah_status }}</td>
                                <td>{{ $tracer->tracer_kuliah_jenjang }}</td>
                                <td>{{ $tracer->tracer_kuliah_jurusan }}</td>
                                <td>
                                    {{-- <a href="{{ route('tracer-kuliah.edit', $tracer->id_tracer_kuliah) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                    <a href="{{ route('tracer-kuliah.show', $tracer->id_tracer_kuliah) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <form action="{{ route('tracer-kuliah.destroy', $tracer->id_tracer_kuliah) }}"
                                        method="POST" class="d-inline">
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
