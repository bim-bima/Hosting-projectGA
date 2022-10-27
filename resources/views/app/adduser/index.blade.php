 @extends('layouts.main') 
 @section('content')
 @include('sweetalert::alert')

<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Tambahkan User Baru</h6>
  </div>
  <div class="row px-1 pr-lg-3">
    <div class="card-body col-lg-6 px-sm-4 px-3">
      <form action="{{ route('add_user.store') }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="mb-2 form-control @error('name') is-invalid @enderror" name="name" required autofocus>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
  
        <label for="email" class="form-label">Email</label>
        <input type="email" class="mb-2 form-control @error('email') is-invalid @enderror" name="email" required autofocus>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
  
        <label for="level" class="form-label">Level User</label>
        <select name="level" required class="mb-2 form-control @error('level') is-invalid @enderror" required>
          <option value="">Pilih Level</option>
          <option value="general-affair">general-affair</option>
          <option value="management">management</option>
        </select>
        @error('level')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
  
        <label for="password" class="form-label">Password</label>
        <input type="password" class="mb-2 form-control @error('password') is-invalid @enderror" name="password" required autofocus>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
  
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" class="mb-2 form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autofocus>
        @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
  
        <button type="submit" class="btn btn-success mt-3 mb-1">
          <i class="fa fa-edit"></i>
          Tambah
        </button>
      </form>
    </div>

    <div class="col-lg-6 py-4">
      <div class="card mb-4">
        <a href="#DaftarRequest" class="d-block card-header px-sm-3 px-2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="DaftarRequest">
          <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </a>
        <div class="collapse hide" id="DaftarRequest">
          <div class="card-body px-sm-3 px-2" style="overflow-y: auto; max-height: 500px;">
            @if($cekuser == 0)
            <div class="col">
              <div class="card border-danger mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="text-center">
                        <i class="fas fa-info-circle"></i>
                        <i>Tidak Ada Data User</i>
                      </div>
                    </div>                      
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if($cekuser > 0)
            <table class="table table-bordered border" id="table" width="100%" cellspacing="0">
              <thead>
                <tr class="bg-primary text-light">
                  <th class="col-6 border px-2">Nama</th>
                  <th class="col-6 border px-2">Email</th>
                  <th class="col-1 border px-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listuser as $list)
                <tr>
                <input type="hidden" class="delete_id" value="{{ $list->id }}">
                  <td class="border px-2">{{ $list->name }}</td>
                  <td class="border px-2">{{ $list->email }}</td>
                  <td class="border px-2 text-center"> 
                    <form action="{{ route('add_user.destroy',$list->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn-danger btn-circle btn-sm border-0 btndeleteuser" type="submit"><i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

      

