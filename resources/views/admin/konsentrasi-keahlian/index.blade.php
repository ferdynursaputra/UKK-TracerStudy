@extends('layouts.admin2')
@section('title', 'Konsentrasi Keahlian')
@section('content')
    <div class="container mt-4">
        <h1>Konsentrasi Keahlian</h1>
        <a href="{{ route('konsentrasi-keahlian.create') }}" class="btn btn-primary mb-3">Tambah Konsentrasi Keahlian</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3 ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Program Keahlian</th>
                    <th>Kode Konsentrasi</th>
                    <th>Konsentrasi Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->programKeahlian->program_keahlian }}</td>
                        <td>{{ $item->kode_konsentrasi_keahlian }}</td>
                        <td>{{ $item->konsentrasi_keahlian }}</td>
                        <td>
                            <a href="{{ route('konsentrasi-keahlian.edit', $item->id_konsentrasi_keahlian) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('konsentrasi-keahlian.destroy', $item->id_konsentrasi_keahlian) }}"
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
@endsection
