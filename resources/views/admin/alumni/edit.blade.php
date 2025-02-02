@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Alumni</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alumni.update', $alumni->id_alumni) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Tahun Lulus -->
                            <div class="form-group mb-3">
                                <label for="id_tahun_lulus">Tahun Lulus</label>
                                <select name="id_tahun_lulus" id="id_tahun_lulus" class="form-control" required>
                                    @foreach ($tahunLulus as $tahun)
                                        <option value="{{ $tahun->id_tahun_lulus }}"
                                            {{ $alumni->id_tahun_lulus == $tahun->id_tahun_lulus ? 'selected' : '' }}>
                                            {{ $tahun->tahun_lulus }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Konsentrasi Keahlian -->
                            <div class="form-group mb-3">
                                <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian</label>
                                <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="form-control"
                                    required>
                                    @foreach ($konsentrasiKeahlian as $konsentrasi)
                                        <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}"
                                            {{ $alumni->id_konsentrasi_keahlian == $konsentrasi->id_konsentrasi_keahlian ? 'selected' : '' }}>
                                            {{ $konsentrasi->konsentrasi_keahlian }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status Alumni -->
                            <div class="form-group mb-3">
                                <label for="id_status_alumni">Status Alumni</label>
                                <select name="id_status_alumni" id="id_status_alumni" class="form-control" required>
                                    @foreach ($statusAlumni as $status)
                                        <option value="{{ $status->id_status_alumni }}"
                                            {{ $alumni->id_status_alumni == $status->id_status_alumni ? 'selected' : '' }}>
                                            {{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- NISN -->
                            <div class="form-group mb-3">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control"
                                    value="{{ $alumni->nisn }}" required>
                            </div>

                            <!-- NIK -->
                            <div class="form-group mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control"
                                    value="{{ $alumni->nik }}" required>
                            </div>
                            
                            <!-- Nama Depan -->
                            <div class="form-group mb-3">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" name="nama_depan" id="nama_depan" class="form-control"
                                    value="{{ $alumni->nama_depan }}" required>
                            </div>

                            <!-- Nama Belakang -->
                            <div class="form-group mb-3">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control"
                                    value="{{ $alumni->nama_belakang }}">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ $alumni->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki
                                    </option>
                                    <option value="P" {{ $alumni->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="form-group mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    value="{{ $alumni->tempat_lahir }}" required>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group mb-3">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                    value="{{ $alumni->tgl_lahir }}" required>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $alumni->alamat }}</textarea>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="form-group mb-3">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control"
                                    value="{{ $alumni->no_hp }}" required>
                            </div>

                            <!-- Tombol -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
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
        </div>
    </div>
@endsection
