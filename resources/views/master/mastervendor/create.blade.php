@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Vendor</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('master_vendor.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
      @csrf
      <div class="mb-2">
        <label for="mv_nama_vendor" class="form-label">Nama Vendor</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="mv_nama_vendor" required>
        @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <label for="mv_lokasi" class="form-label">Lokasi Vendor</label>
      <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="mv_lokasi" required>
      @error('lokasi')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info my-3 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_vendor.index') }}" class="text-white text-decoration-none">kembali</a>
      </button>
      <button type="submit" class="btn btn-success my-3">
				<i class="fa fa-plus-circle"></i>
				Tambah
			</button>
    </form>
  </div>
</div>
@endsection


