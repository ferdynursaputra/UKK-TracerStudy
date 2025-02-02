@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row col-md-8">
        <div class="col-md-8">
            <h4>Detail Tracer Kerja</h4>
            <p><strong>Nama Alumni:</strong> {{ $tracerKerja->alumni->nama_depan }} {{ $tracerKerja->alumni->nama_belakang }}</p>
            <p><strong>Pekerjaan:</strong> {{ $tracerKerja->tracer_kerja_pekerjaan }}</p>
            <p><strong>Nama Tempat Kerja:</strong> {{ $tracerKerja->tracer_kerja_nama }}</p>
            <p><strong>Jabatan:</strong> {{ $tracerKerja->tracer_kerja_jabatan }}</p>
            <p><strong>Status:</strong> {{ $tracerKerja->tracer_kerja_status }}</p>
            <p><strong>Lokasi:</strong> {{ $tracerKerja->tracer_kerja_lokasi }}</p>
            <p><strong>Alamat:</strong> {{ $tracerKerja->tracer_kerja_alamat }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $tracerKerja->tracer_kerja_tgl_mulai }}</p>
            <p><strong>Gaji:</strong> {{ 'Rp. ' . number_format($tracerKerja->tracer_kerja_gaji, 0, ',', '.') }}</p>
            <!-- Add other details similarly -->
            <a href="{{ route('tracer-kerja.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
