@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah PIC</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('app_pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
      @csrf
      <label for="ap_nama_pengajuan" class="form-label">Nama Pengajuan</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="ap_nama_pengajuan" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <label for="ap_jenis_pengajuan" class="form-label">Jenis Pengajuan</label>
      <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="ap_jenis_pengajuan" required>
      @error('jenis')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror

      <div class="col-md-6">
          <label for="ap_mv_id" class="form-label">Vendor</label>
          <select name="ap_mv_id" class="form-control @error('ap_mv_id') is-invalid @enderror" required>
            <option value="">Pilih Vendor</option>
            @foreach ($vendor as $ven)
            <option value="{{ $ven->id }}">{{ $ven->mv_nama_vendor}}</option>
            @endforeach    
          </select>
          @error('ap_mv_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      <label for="ap_biaya" class="form-label">Biaya</label>
      <input type="text" class="form-control @error('biaya') is-invalid @enderror" name="ap_biaya" required>
      @error('biaya')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <label for="ap_catatan" class="form-label">Catatan</label>
      <input type="text" class="form-control @error('catatan') is-invalid @enderror" name="ap_catatan" required>
      @error('catatan')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <label for="ap_tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
      <input type="date" class="form-control @error('pengadaan') is-invalid @enderror" name="ap_tanggal_pengadaan" >
      @error('pengadaan')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror

      <div class="col-md-6">
          <label for="ap_mp_id" class="form-label">PIC</label>
          <select name="ap_mp_id" class="form-control @error('ap_mp_id') is-invalid @enderror" required>
            <option value="">Pilih Vendor</option>
            @foreach ($pic as $pi)
            <option value="{{ $pi->id }}">{{ $pi->mp_nama}}</option>
            @endforeach    
          </select>
          @error('ap_mp_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      <button class="btn btn-info my-3 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('app_pengajuan.index') }}" class="text-white text-decoration-none">kembali</a>
      </button>
      <button type="submit" class="btn btn-success my-3">
        <i class="fa fa-plus-circle"></i>
        Tambah
      </button>
    </form>
  </div>
</div>

@endsection


