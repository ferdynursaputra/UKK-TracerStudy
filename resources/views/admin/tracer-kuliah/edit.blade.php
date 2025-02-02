@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Tracer Kuliah</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tracer-kuliah.update', $tracerKuliah->id_tracer_kuliah) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="id_alumni">Alumni</label>
                            <select name="id_alumni" id="id_alumni" class="form-control" required>
                                @foreach($alumni as $data)
                                    <option value="{{ $data->id_alumni }}" {{ $tracerKuliah->id_alumni == $data->id_alumni ? 'selected' : '' }}>{{ $data->nama_depan }} {{ $data->nama_belakang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_kampus">Kampus</label>
                            <input type="text" name="tracer_kuliah_kampus" id="tracer_kuliah_kampus" class="form-control" value="{{ $tracerKuliah->tracer_kuliah_kampus }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_status">Status</label>
                            <input type="text" name="tracer_kuliah_status" id="tracer_kuliah_status" class="form-control" value="{{ $tracerKuliah->tracer_kuliah_status }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_jenjang">Jenjang</label>
                            <input type="text" name="tracer_kuliah_jenjang" id="tracer_kuliah_jenjang" class="form-control" value="{{ $tracerKuliah->tracer_kuliah_jenjang }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_jurusan">Jurusan</label>
                            <input type="text" name="tracer_kuliah_jurusan" id="tracer_kuliah_jurusan" class="form-control" value="{{ $tracerKuliah->tracer_kuliah_jurusan }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_linier">Linier</label>
                            <select name="tracer_kuliah_linier" id="tracer_kuliah_linier" class="form-control" required>
                                <option value="1" {{ $tracerKuliah->tracer_kuliah_linier ? 'selected' : '' }}>Ya</option>
                                <option value="0" {{ !$tracerKuliah->tracer_kuliah_linier ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tracer_kuliah_alamat">Alamat</label>
                            <textarea name="tracer_kuliah_alamat" id="tracer_kuliah_alamat" class="form-control" rows="3" required>{{ $tracerKuliah->tracer_kuliah_alamat }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tracer-kuliah.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection