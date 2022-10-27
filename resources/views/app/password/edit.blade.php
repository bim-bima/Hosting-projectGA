 @extends('layouts.main')
 @section('content')
 @include('sweetalert::alert')

 @if(auth()->user()->level == "pegawai")
 <div style="margin-block-end: 75px">
@endif

<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Ubah Password</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('update_password') }}" method="POST" enctype="multipart/form-data" class="col-lg-6 px-0">
      @csrf
      @method('put')
      <label for="current_password" class="form-label" data-aos="fade-right" data-aos-delay="150">Password Saat Ini</label>
      <input type="password" class="mb-3 form-control @error('current_password') is-invalid @enderror" name="current_password" required autofocus data-aos="fade-right" data-aos-delay="200" >
      @error('current_password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror

      <label for="password" class="form-label" data-aos="fade-right" data-aos-delay="200">Password Baru</label>
      <input type="password" class="mb-3 form-control @error('password') is-invalid @enderror" name="password" required autofocus data-aos="fade-right" data-aos-delay="250">
      @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror

      <label for="password_confirmation" class="form-label" data-aos="fade-right" data-aos-delay="250">Konfirmasi Password</label>
      <input type="password" class="mb-3 form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autofocus data-aos="fade-right" data-aos-delay="300">
      @error('password_confirmation')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror

      <button class="btn btn-info mt-3 mb-1 mr-1">
        <a href="{{ route('home') }}" class="text-white text-decoration-none">
          <i class="fa fa-angle-left"></i>
          Kembali
        </a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-1">
        <i class="fa fa-edit"></i>
        Update
      </button>
    </form>
  </div>
</div>

@if(auth()->user()->level == "pegawai")
</div>
@endif
@endsection

