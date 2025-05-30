@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Konsentrasi Keahlian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('konsentrasi-keahlian.update', $konsentrasiKeahlian->id_konsentrasi_keahlian) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_program_keahlian">Program Keahlian</label>
            <select name="id_program_keahlian" id="id_program_keahlian" class="form-control" required>
                <option value="" disabled>Pilih Program Keahlian</option>
                @foreach ($programKeahlian as $program)
                <option value="{{ $program->id_program_keahlian }}" {{ $program->id_program_keahlian == $konsentrasiKeahlian->id_program_keahlian ? 'selected' : '' }}>
                        {{ $program->program_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kode_konsentrasi_keahlian">Kode Konsentrasi Keahlian</label>
            <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian" value="{{ $konsentrasiKeahlian->kode_konsentrasi_keahlian }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="konsentrasi_keahlian">Konsentrasi Keahlian</label>
            <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian" value="{{ $konsentrasiKeahlian->konsentrasi_keahlian }}" class="form-control mb-3" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('konsentrasi-keahlian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection