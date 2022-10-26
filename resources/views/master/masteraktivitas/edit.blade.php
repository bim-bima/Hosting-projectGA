 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Aktivitas</h6>
    </div>
    <div class="card-body">
           <form action="{{ route('master_aktivitas.update',$aktivitas->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
           @csrf
           @method('put')
               <label for="ma_nama_aktivitas" class="form-label">Nama Aktivitas</label>
               <input type="text" class="form-control @error('nama') is-invalid @enderror" name="ma_nama_aktivitas" value="{{ $aktivitas->ma_nama_aktivitas }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
           <button class="btn btn-info my-3 mr-1">
            <i class="fa fa-angle-left"></i>
            <a href="{{ route('master_aktivitas.index') }}" class="text-white text-decoration-none">Kembali</a>
          </button>
          <button type="submit" class="btn btn-success my-3">
            <i class="fa fa-edit"></i>
            Edit
          </button>
       </form>
      </div>
    </div>
@endsection

