@extends('layouts.main')

@section('content')
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Booking Kendaraan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('app_kendaraan.store') }}" method="POST" enctype="multipart/form-data" class="row px-0">
      @csrf
      <!-- <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_mk_id" class="form-label">Kendaraan</label>
        <select name="ak_mk_id" class="form-control @error('ak_mk_id') is-invalid @enderror" required>
          <option value="">Pilih Kendaraan</option>
          @foreach ($namaKendaraan as $kendaraan)
          <option value="{{ $kendaraan->mk_nama_kendaraan }}">{{ $kendaraan->mk_nama_kendaraan}}</option>
          @endforeach      
        </select>
        @error('ak_mk_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div> -->

        <div class="col-md-6 mb-sm-2 mb-3">  
          <label for="ak_mk_id">Kendaraan</label>
          <input type="text" id="ak_mk_id" name="ak_mk_id" list="list_kendaraan" class="form-control" placeholder="Pilih Kendaraan">
          <datalist id="list_kendaraan" class="select2">  
            @foreach ($namaKendaraan as $kendaraan)
            @if( old('category_asset') == $kendaraan->mca_category )
            <option value="{{ $kendaraan->mk_nama_kendaraan }}" selected>{{ $kendaraan->mk_nama_kendaraan}}</option>
            @else
            <option value="{{ $kendaraan->mk_nama_kendaraan }}">{{ $kendaraan->mk_nama_kendaraan}}</option>
            @endif
            @endforeach    
          </datalist> 
      </div>

    <script>
      $(document).ready(function() {
        $('.select2').select2();
      });
    </script>

      
        <div class="col-md-6 mb-sm-2 mb-3">
          <label for="ak_pengguna" class="form-label">Pengguna</label>
          <input type="text" class="form-control @error('ak_pengguna') is-invalid @enderror" name="ak_pengguna" required>
          @error('ak_pengguna')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_tanggal_mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="ak_tanggal_mulai"
            required>
        @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_jam" class="form-label">Jam Mulai</label>
        <input type="time" class="form-control @error('jam') is-invalid @enderror" name="ak_jam" required>
        @error('jam')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_tanggal_selesai" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control @error('tanggal_selesaiss') is-invalid @enderror" name="ak_tanggal_selesai"
            required>
        @error('tanggal_selesai')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_jam_selesai" class="form-label">Jam Selesai</label>
        <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" name="ak_jam_selesai" required>
        @error('jam_selesai')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

            <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_lokasi_tujuan" class="form-label">Lokasi Tujuan</label>
        <input type="text" class="form-control @error('lokasi_tujuan') is-invalid @enderror" name="ak_lokasi_tujuan" required>
        @error('lokasi_tujuan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-sm-2 mb-3">
        <label for="ak_tujuan_pemakaian" class="form-label">Tujuan Pemakaian</label>
        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="ak_tujuan_pemakaian" required>
        @error('tujuan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mt-2 mb-1">
        @if(auth()->user()->level == "general-affair")
        <button class="btn btn-info mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_kendaraan.index') }}"class="text-white text-decoration-none">Kembali</a>
        </button>
        @endif
        @if(auth()->user()->level == "pegawai")
        <button class="btn btn-info mt-4 mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="/home" class="text-white text-decoration-none">Kembali</a>
        </button>
        @endif
        <button type="submit" class="btn btn-success">
          <i class="fa fa-plus-circle"></i>
          Tambah
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
