@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Program Keahlian</h1>

    <form action="{{ route('program-keahlian.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_bidang_keahlian">Bidang Keahlian</label>
            <select name="id_bidang_keahlian" id="id_bidang_keahlian" class="form-control" required>
                <option value="" disabled selected>Pilih Bidang Keahlian</option>
                @foreach ($bidangKeahlian as $item)
                    <option value="{{ $item->id_bidang_keahlian }}">{{ $item->bidang_keahlian }}</option>
                @endforeach
            </select>
        </div>        
        <div class="form-group">
            <label for="kode_program_keahlian">Kode Program Keahlian</label>
            <input type="text" name="kode_program_keahlian" id="kode_program_keahlian" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="program_keahlian">Program Keahlian</label>
            <input type="text" name="program_keahlian" id="program_keahlian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3 me-2">Simpan</button>
        <a href="{{ route('program-keahlian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
