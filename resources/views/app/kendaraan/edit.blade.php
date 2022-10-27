 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Edit kendaraan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('app_kendaraan.update',$kendaraan->id) }}" method="POST" enctype="multipart/form-data" class="px-0 row">
      @csrf
      @method('put')
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_mk_id" class="form-label">Nama kendaraan</label>
        <select name="ak_mk_id" class="form-control @error('ak_mk_id') is-invalid @enderror" required>
          @foreach ($namaKendaraan as $item)
          <option value="{{ $item->id }}" 
          {{ $item->id == $kendaraan->ak_mk_id ? 'selected="selected"' : '' }}>
          {{ $item->mk_nama_kendaraan}}</option>
          @endforeach    
        </select>
        @error('ak_mk_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_pengguna" class="form-label">Pengguna</label>
        <input type="text" class="form-control @error('pengguna') is-invalid @enderror" name="ak_pengguna" value="{{ $kendaraan->ak_pengguna }}" required>
        @error('pengguna')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_tanggal_mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="ak_tanggal_mulai" value="{{ $kendaraan->ak_tanggal_mulai }}" required>
        @error('tanggal')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_jam" class="form-label">Jam</label>
        <input type="time" class="form-control @error('jam') is-invalid @enderror" name="ak_jam" value="{{ $kendaraan->ak_jam }}" required>
        @error('jam')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_kondisi" class="form-label">Kondisi kendaraan</label>
        <input type="text" class="form-control @error('kondisi') is-invalid @enderror" name="ak_kondisi" value="{{ $kendaraan->ak_kondisi }}" required>
        @error('kondisi')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_lokasi_tujuan" class="form-label">Lokasi Tujuan</label>
        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="ak_lokasi_tujuan" value="{{ $kendaraan->ak_lokasi_tujuan }}" required>
        @error('lokasi')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_tujuan_pemakaian" class="form-label">Tujuan Pemakaian</label>
        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="ak_tujuan_pemakaian" value="{{ $kendaraan->ak_tujuan_pemakaian }}" required>
        @error('tujuan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <button class="btn btn-info my-3 mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_kendaraan.index') }}" class="text-white text-decoration-none">Kembali</a>
        </button>
        <button type="submit" class="btn btn-success my-3">
          <i class="fa fa-edit"></i>
          Edit
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

