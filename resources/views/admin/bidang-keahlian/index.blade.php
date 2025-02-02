@extends('layouts.admin2')
@section('title', 'Bidang Keahlian')
@section('content')
    <div class="container mt-4">
        <h1>Bidang Keahlian</h1>
        <a href="{{ route('bidang-keahlian.create') }}" class="btn btn-primary mb-3">Tambah Bidang Keahlian</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Bidang Keahlian</th>
                    <th>Nama Bidang Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->kode_bidang_keahlian }}</td>
                        <td>{{ $item->bidang_keahlian }}</td>
                        <td>
                            <a href="{{ route('bidang-keahlian.edit', ['bidang_keahlian' => $item->id_bidang_keahlian]) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form
                                action="{{ route('bidang-keahlian.destroy', ['bidang_keahlian' => $item->id_bidang_keahlian]) }}"
                                method="POST" style="display: inline-block;">
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
