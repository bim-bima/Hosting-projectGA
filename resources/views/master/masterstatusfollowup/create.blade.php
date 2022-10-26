@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Status FollowUp</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('master_statusfollowup.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
      @csrf
      <label for="msf_status" class="form-label">Nama Status FollowUp</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="msf_status" required>
      @error('nama')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info my-3 mr-1">
        <i class="fa fa-angle-left"></i>
      	<a href="{{ route('master_statusfollowup.index') }}" class="text-white text-decoration-none">Kembali</a>
    	</button>
			<button type="submit" class="btn btn-success my-3">
        <i class="fa fa-plus-circle"></i>
        Tambah
      </button>
    </form>
    </div>
  </div>
@endsection


