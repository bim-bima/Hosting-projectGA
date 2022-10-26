@extends('layouts.main')

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Asset</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('app_asset.store') }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-md-6">
          <label for="as_nama_asset" class="form-label">Nama Asset</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="as_nama_asset" required>
          @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_mla_id" class="form-label">Lokasi Asset</label>
          <select name="as_mla_id" class="form-control @error('as_mla_id') is-invalid @enderror" required>
            <option value="">Pilih Lokasi</option>
            @foreach ($lokasiAsset as $la)
            <option value="{{ $la->id }}">{{ $la->mla_lokasi_asset}}</option>
            @endforeach    
          </select>
          @error('as_mla_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_kode_asset" class="form-label">Kode Asset</label>
          <input type="text" class="form-control @error('kodeasset') is-invalid @enderror" name="as_kode_asset" required>
          @error('kodeasset')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_tahun_kepemilikan" class="form-label">Tahun Kepemilikan</label>
          <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="as_tahun_kepemilikan" required>
          @error('tahun')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_harga" class="form-label">Harga Asset </label>
          <input type="text" class="form-control @error('harga') is-invalid @enderror" name="as_harga" required>
          @error('harga')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_nilai_residu" class="form-label">Nilai Residu</label>
          <input type="text" class="form-control @error('nilairesidu') is-invalid @enderror" name="as_nilai_residu" required>
          @error('nilairesidu')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="as_umur_manfaat" class="form-label">Umur Manfaat</label>
          <input type="text" class="form-control @error('umurmanfaat') is-invalid @enderror" name="as_umur_manfaat" required>
          @error('umurmanfaat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6 pt-3">
          <button class="btn btn-info mr-1">
            <i class="fa fa-angle-left"></i>
            <a  href="{{ route('app_asset.index') }}" class="text-white text-decoration-none">Kembali</a>
          </button>
          <button type="submit" class="btn btn-success my-3">
            <i class="fa fa-plus-circle"></i>
            Tambah
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection


