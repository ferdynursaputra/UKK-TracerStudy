@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Program Keahlian</h1>

    <form action="{{ route('program-keahlian.update', $programKeahlian->id_program_keahlian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_bidang_keahlian">Bidang Keahlian</label>
            <select name="id_bidang_keahlian" id="id_bidang_keahlian" class="form-control" required>
                <option value="" disabled>Pilih Bidang Keahlian</option>
                @foreach ($bidangKeahlian as $item)
                    <option value="{{ $item->id_bidang_keahlian }}" {{ $item->id_bidang_keahlian == $programKeahlian->id_bidang_keahlian ? 'selected' : '' }}>
                        {{ $item->bidang_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="kode_program_keahlian">Kode Program Keahlian</label>
            <input type="text" name="kode_program_keahlian" id="kode_program_keahlian" class="form-control" value="{{ $programKeahlian->kode_program_keahlian }}" required>
        </div>
        <div class="form-group">
            <label for="program_keahlian">Program Keahlian</label>
            <input type="text" name="program_keahlian" id="program_keahlian" class="form-control mb-3" value="{{ $programKeahlian->program_keahlian }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('program-keahlian.index') }}" class="btn btn-secondary ">Kembali</a>    
    </form>
</div>
@endsection
