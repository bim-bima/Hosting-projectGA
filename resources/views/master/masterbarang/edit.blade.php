 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('master_barang.update',$barang->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
      @csrf
      @method('put')
      <label for="mb_nama_barang" class="form-label">Nama Barang</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="mb_nama_barang" value="{{ $barang->mb_nama_barang }}" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info my-3 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('master_barang.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
      <button type="submit" class="btn btn-success my-3">
        <i class="fa fa-edit"></i>
        Edit
      </button>
    </form>
  </div>
</div>
@endsection

