@extends('layouts.admin')

<style>
    /* Styling tambahan untuk form */
    .form-group {
        margin-bottom: 1.5rem;
    }
</style>

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4>Tambah Data Tracer Kerja</h4>
                <form action="{{ route('tracer-kerja.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_alumni">Nama Alumni</label>
                        <select class="form-select select-search" name="id_alumni" id="id_alumni" required>
                            <option value="" selected disabled>Pilih Nama Alumni</option> <!-- Placeholder -->
                            @foreach ($alumni as $data)
                                <option value="{{ $data->id_alumni }}">{{ $data->nama_depan }} {{ $data->nama_belakang }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_pekerjaan">Pekerjaan</label>
                        <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_nama">Nama Tempat Kerja</label>
                        <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_jabatan">Jabatan</label>
                        <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_status">Status</label>
                        <input type="text" name="tracer_kerja_status" id="tracer_kerja_status" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_lokasi">Lokasi</label>
                        <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_alamat">Alamat</label>
                        <textarea name="tracer_kerja_alamat" id="tracer_kerja_alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_tgl_mulai">Tanggal Mulai</label>
                        <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tracer_kerja_gaji">Gaji</label>
                        <input type="number" name="tracer_kerja_gaji" id="tracer_kerja_gaji" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('tracer-kerja.index') }}" class="btn btn-secondary">Kembali</a>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
