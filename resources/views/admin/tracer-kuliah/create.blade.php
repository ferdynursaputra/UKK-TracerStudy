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
                <h4>Tambah Data Tracer Kuliah</h4>
                <form action="{{ route('tracer-kuliah.store') }}" method="POST">
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
                        <label for="tracer_kuliah_kampus">Kampus</label>
                        <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tracer_kuliah_status">Status</label>
                        <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tracer_kuliah_jenjang">Jenjang</label>
                        <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tracer_kuliah_jurusan">Jurusan</label>
                        <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tracer_kuliah_linier">Linier</label>
                        <select name="tracer_kuliah_linier" id="tracer_kuliah_linier" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tracer_kuliah_alamat">Alamat</label>
                        <textarea name="tracer_kuliah_alamat" id="tracer_kuliah_alamat" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('tracer-kuliah.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    
    
@endsection
