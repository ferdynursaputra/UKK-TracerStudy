@section('content')
<div class="container mt-4">
    <h4>Detail Testimoni</h4>
    <div class="mb-3">
        <label class="form-label">Nama Alumni</label>
        <p class="form-control">{{ $testimoni->alumni->nama_depan }} {{ $testimoni->alumni->nama_belakang }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Testimoni</label>
        <p class="form-control">{{ $testimoni->testimoni }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Testimoni</label>
        <p class="form-control">{{ $testimoni->tgl_testimoni }}</p>
    </div>
    <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
