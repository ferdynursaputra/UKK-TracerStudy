@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Alumni</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alumni.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="id_tahun_lulus">Tahun Lulus</label>
                                <select name="id_tahun_lulus" id="id_tahun_lulus" class="form-control" required>
                                    <option value="">Pilih Tahun Lulus</option>
                                    @foreach ($tahunLulus as $tahun)
                                        <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian</label>
                                <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="form-control"
                                    required>
                                    <option value="">Pilih Konsentrasi Keahlian</option>
                                    @foreach ($konsentrasiKeahlian as $konsentrasi)
                                        <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">
                                            {{ $konsentrasi->konsentrasi_keahlian }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="id_status_alumni">Status Alumni</label>
                                <select name="id_status_alumni" id="id_status_alumni" class="form-control" required>
                                    <option value="">Pilih Status Alumni</option>
                                    @foreach ($statusAlumni as $status)
                                        <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" id="nisn" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" name="nama_depan" id="nama_depan" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="akun_fb">Akun Facebook</label>
                                <input type="text" name="akun_fb" id="akun_fb" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="akun_ig">Akun Instagram</label>
                                <input type="text" name="akun_ig" id="akun_ig" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="akun_tiktok">Akun TikTok</label>
                                <input type="text" name="akun_tiktok" id="akun_tiktok" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

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
