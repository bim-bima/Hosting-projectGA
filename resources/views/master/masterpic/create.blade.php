@extends('layouts.main')

@section('content')
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Tambah PIC</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('master_pic.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-6 px-0">
      @csrf
      <label for="nama_pic" class="form-label">Nama PIC</label>
      <input type="text" class="mb-2 form-control @error('nama_pic') is-invalid @enderror" name="nama_pic" required autofocus value="{{ old('nama_pic') }}" >
      @error('nama_pic')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info mt-3 mb-2 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_pic.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-2">
        <i class="fa fa-plus-circle"></i>
        Tambah
      </button>
    </form>
  </div>
</div>
@endsection


