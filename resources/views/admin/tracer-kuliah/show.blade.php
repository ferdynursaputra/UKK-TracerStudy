@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Tracer Kuliah</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Alumni:</strong>
                        <p>{{ $tracerKuliah->alumni->nama_depan }} {{ $tracerKuliah->alumni->nama_belakang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kampus:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_kampus }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_status }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jenjang:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_jenjang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jurusan:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_jurusan }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Linier:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_linier ? 'Ya' : 'Tidak' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Alamat:</strong>
                        <p>{{ $tracerKuliah->tracer_kuliah_alamat }}</p>
                    </div>
                    <a href="{{ route('tracer-kuliah.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
