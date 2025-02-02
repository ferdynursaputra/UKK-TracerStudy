@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Status Alumni</h1>
    <form action="{{ route('status-alumni.update', $statusAlumni->id_status_alumni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control mb-3" value="{{ $statusAlumni->status }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('status-alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

