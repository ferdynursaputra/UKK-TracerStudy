@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mt-4">Detail Alumni</h1>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-header">
                <h4>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>NISN:</strong> {{ $alumni->nisn }}</p>
                        <p><strong>NIK:</strong> {{ $alumni->nik }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </p>
                        <p><strong>Tempat, Tanggal Lahir:</strong> {{ $alumni->tempat_lahir }}, {{ $alumni->tgl_lahir }}</p>
                        <p><strong>Alamat:</strong> {{ $alumni->alamat }}</p>
                        <p><strong>No HP:</strong> {{ $alumni->no_hp }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tahun Lulus:</strong> {{ $alumni->tahunLulus->tahun_lulus ?? '-' }}</p>
                        <p><strong>Konsentrasi Keahlian:</strong>
                            {{ $alumni->konsentrasiKeahlian->konsentrasi_keahlian ?? '-' }}</p>
                        <p><strong>Status Alumni:</strong> {{ $alumni->statusAlumni->status ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $alumni->email }}</p>
                        <p><strong>Akun Facebook:</strong> {{ $alumni->akun_fb ?? '-' }}</p>
                        <p><strong>Akun Instagram:</strong> {{ $alumni->akun_ig ?? '-' }}</p>
                        <p><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok ?? '-' }}</p>
                        <p><strong>Status Login:</strong>
                            {{ $alumni->status_login == 1 ? 'Aktif' : 'Tidak Aktif' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
