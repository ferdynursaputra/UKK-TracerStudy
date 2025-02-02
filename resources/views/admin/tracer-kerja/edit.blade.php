@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h4>Edit Data Tracer Kerja</h4>
            <form action="{{ route('tracer-kerja.update', $tracerKerja->id_tracer_kerja) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="id_alumni">Nama Alumni</label>
                    <select name="id_alumni" id="id_alumni" class="form-control">
                        <option value="">-- Pilih Alumni --</option>
                        @foreach ($alumni as $item)
                            <option value="{{ $item->id_alumni }}" {{ $tracerKerja->id_alumni == $item->id_alumni ? 'selected' : '' }}>
                                {{ $item->nama_depan }} {{ $item->nama_belakang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Add the remaining fields similarly -->
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tracer-kerja.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
