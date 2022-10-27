@extends('layouts.main')

@section('content')
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Tambah Jenis Pengajuan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('master_jenispengajuan.store') }}" method="POST" enctype="multipart/form-data" class="px-0 col-lg-6">
      @csrf
      <label for="mjp_jenis" class="form-label">Nama Jenis Pengajuan</label>
      <input type="text" class="mb-1 form-control @error('nama') is-invalid @enderror" name="mjp_jenis" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info mt-3 mb-1 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_jenispengajuan.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-1">
        <i class="fa fa-plus-circle"></i>
        Tambah
      </button>
    </form>
  </div>
</div>
@endsection


