@extends('layouts.admin')

@section('content')

    <h1>Edit Bidang Keahlian</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('bidang-keahlian.update', $bidangKeahlian->id_bidang_keahlian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode_bidang_keahlian">Kode Bidang Keahlian</label>
            <input type="text" name="kode_bidang_keahlian" class="form-control" value="{{ $bidangKeahlian->kode_bidang_keahlian }}" required>
        </div>
        <div class="form-group">
            <label for="bidang_keahlian">Nama Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" class="form-control mb-3" value="{{ $bidangKeahlian->bidang_keahlian }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('bidang-keahlian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
