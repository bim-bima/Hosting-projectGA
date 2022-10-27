 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('master_barang.update',$barang->id) }}" method="POST" enctype="multipart/form-data" class="px-0 col-lg-6">
      @csrf
      @method('put')
      <label for="mb_nama_barang" class="form-label">Nama Barang</label>
      <input type="text" class="mb-1 form-control @error('nama') is-invalid @enderror" name="mb_nama_barang" value="{{ $barang->mb_nama_barang }}" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info mt-3 mb-1 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_barang.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-1">
        <i class="fa fa-edit"></i>
        Edit
      </button>
    </form>
  </div>
</div>
@endsection

