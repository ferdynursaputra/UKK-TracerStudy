@extends('layouts.admin2')
@section('title', 'Program Keahlian')
@section('content')
    <div class="container mt-4">
        <h1>Daftar Program Keahlian</h1>
        <a href="{{ route('program-keahlian.create') }}" class="btn btn-primary mb-3">Tambah Program Keahlian</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Bidang Keahlian</th>
                    <th>Kode Program Keahlian</th>
                    <th>Program Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->bidangKeahlian->bidang_keahlian }}</td>
                        <td>{{ $item->kode_program_keahlian }}</td>
                        <td>{{ $item->program_keahlian }}</td>
                        <td>
                            <a href="{{ route('program-keahlian.edit', $item->id_program_keahlian) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('program-keahlian.destroy', $item->id_program_keahlian) }}" method="POST"
                                style="display: inline-block;">
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
