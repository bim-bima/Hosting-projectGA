 @extends('layouts.main')
 @section('content')
 @include('sweetalert::alert')

@if(auth()->user()->level == "pegawai")
 <div style="margin-block-end: 170px">
@endif

   <div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
     <div class="card-header py-3 px-sm-3 px-2">
       <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Ubah Profile</h6>
     </div>
     <div class="card-body px-sm-3 px-2">
       <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data" class="col-lg-6 px-0">
         @csrf
         @method('put')
         <label for="name" class="form-label" data-aos="fade-right" data-aos-delay="150">Nama</label>
         <input type="text" class="mb-3 form-control @error('name') is-invalid @enderror" name="name" required autofocus data-aos="fade-right" data-aos-delay="200" value="{{ $name }}" >
         @error('name')
         <div class="invalid-feedback">{{ $message }}</div>
         @enderror
   
         <label for="email" class="form-label" data-aos="fade-right" data-aos-delay="200">Email</label>
         <input type="email" class="mb-1 form-control @error('email') is-invalid @enderror" name="email" required autofocus data-aos="fade-right" data-aos-delay="250" value="{{ $email }}" >
         @error('email')
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

