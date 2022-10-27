 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Edit Jenis Barang</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('master_jenisbarang.update',$jenisbarang->id) }}" method="POST" enctype="multipart/form-data" class="px-0 col-lg-6">
      @csrf
      @method('put')
      <label for="mjb_jenis_barang" class="form-label">Nama jenis Barang</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="mjb_jenis_barang" value="{{ $jenisbarang->mjb_jenis_barang }}" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info mt-3 mb-1 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_jenisbarang.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-1">
        <i class="fa fa-edit"></i>
        Edit
      </button>
    </form>
  </div>
</div>
@endsection

