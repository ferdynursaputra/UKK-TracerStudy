@extends('layouts.admin2')
@section('title', 'Status Alumni')

@section('content')
    <div class="container mt-4">
        <h1>Status Alumni</h1>
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
        <a href="{{ route('status-alumni.create') }}" class="btn btn-primary mb-3">Tambah Status Alumni</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('status-alumni.edit', $item->id_status_alumni) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('status-alumni.destroy', $item->id_status_alumni) }}" method="POST"
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
