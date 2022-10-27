@extends('layouts.main')
@section('content')

<div class="row">
  <div class="col-lg-6 pr-lg-1">
    <form action="{{ route('master_kendaraan.update',$kendaraan->id) }}" method="POST" enctype="multipart/form-data" class="px-0">
      @csrf
      @method('put')
    <div class="card shadow-sm mb-4" data-aos="fade-right" data-aos-delay="50">
      <div class="card-header py-3 px-sm-3 px-2">
        <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Kondisi Kendaraan</h6>
      </div>
      <div class="card-body px-0">  
        <?php   
          $bahan = $kendaraan->mk_bahan_bakar;
          $bahanbakar = substr($bahan,-0,3);
          $bahan_bakar = intval($bahanbakar);
         ?>

        <div class="col-12 mb-sm-2 mb-3 px-sm-3 px-2">
          <label for="Bahan_bakar" class="form-label">Jumlah Bahan Bakar (Liter)</label>
          <input type="number" class="form-control @error('bahan_bakar') is-invalid @enderror" name="bahan_bakar" required value="{{ $bahan_bakar }}">
          @error('bahan_bakar')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        <div class="col-12 mb-sm-2 mb-3 px-sm-3 px-2">
          <label for="kilometer" class="form-label">Kilometer Kendaraan</label>
          <input type="number" min="1" class="form-control @error('kilometer') is-invalid @enderror" name="kilometer" required  value="{{ $kendaraan->mk_kilometer }}">
          @error('kilometer')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12 px-sm-3 px-2 mb-3">
          <label for="kondisi_lain" class="form-label">Catatan</label>
          <textarea type="text" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi_lain" required value="{{ $kendaraan->mk_kondisi_lain }}" rows="3" >{{ $kendaraan->mk_kondisi_lain }}</textarea>
          @error('kondisi_lain')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 pl-lg-1">
    <div class="card shadow-sm mb-4" data-aos="fade-left" data-aos-delay="50">
      <div class="card-header py-3 px-sm-3 px-2">
        <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-left" data-aos-delay="100">Data Kendaraan</h6>
      </div>
      <div class="card-body px-sm-3 px-2">
        <div class="row">
          <div class="col-md-6 mb-sm-2 mb-3 pr-md-1">
            <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
            <input type="text" class="form-control @error('nama_kendaraan') is-invalid @enderror" name="nama_kendaraan" value="{{ $kendaraan->mk_nama_kendaraan }}" required>
            @error('nama_kendaraan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6 mb-sm-2 mb-3 pl-md-1">
            <label for="no_polisi" class="form-label">No Polisi</label>
            <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" required value="{{ $kendaraan->mk_no_polisi }}">
            @error('no_polisi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6 mb-sm-2 mb-3 pr-md-1">
            <label for="mk_jenis" class="form-label">Jenis Kendaraan</label>
            <select name="mk_jenis" class="form-control @error('mk_jenis') is-invalid @enderror" required>
              <option value="{{ $kendaraan->mk_jenis }}">{{ $kendaraan->mk_jenis }}</option>
              <option value="Roda 2">Roda Dua (2)</option>
              <option value="Roda 4">Roda Empat (4)</option>
            </select>
            @error('mk_jenis')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6 mb-sm-2 mb-3 pl-md-1">
            <label for="warna" class="form-label">Warna Kendaraan</label>
            <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" required  value="{{ $kendaraan->mk_warna }}">
            @error('warna')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12 mb-sm-2 mb-3">
            <label for="merk" class="form-label">Merk Kendaraan</label>
            <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" required  value="{{ $kendaraan->mk_merk }}">
            @error('merk')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 mt-3 mb-1">
            <button class="btn btn-info mr-1">
              <i class="fa fa-angle-left"></i>
              <a href="{{ route('app_kendaraan.index') }}" class="text-white text-decoration-none">
                Kembali
              </a>
            </button>
            <button type="submit" class="btn btn-success">
              <i class="fa fa-edit"></i>
              Edit
            </button>
          </div>          
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
