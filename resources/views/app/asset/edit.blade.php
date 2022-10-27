 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="100">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="150">Edit Aset</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('app_asset.update',$asset->id) }}" method="POST" enctype="multipart/form-data" class="row">
      @csrf
      @method('put')
      <div class="col-lg-6 mb-3 mb-sm-2 pr-lg-2">
        <label for="nama_asset" class="form-label" >Nama Aset</label>
        <input type="text" class="form-control @error('nama_asset') is-invalid @enderror" name="nama_asset" value="{{ $asset->as_nama_asset }}" required >
        @error('nama_asset')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 mb-3 mb-sm-2 pl-lg-2">
        <label for="category_asset" class="form-label" >Kategori Aset</label>
        <select name="category_asset" class="form-control @error('category_asset') is-invalid @enderror" required >
          @foreach ($categoryAsset as $category)
          <option value="{{ $category->mca_category }}" 
          {{ $category->mca_category == $asset->as_mca_id ? 'selected="selected"' : '' }}>
          {{ $category->mca_category}}</option>
          @endforeach    
        </select>
        @error('category_asset')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 mb-3 mb-sm-2 pr-lg-2">
        <label for="tanggal" class="form-label">Tanggal Kepemilikan</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" required value="{{ $asset->as_tanggal }}">
        @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 mb-3 mb-sm-2 pl-lg-2">
        <label for="lokasi_asset" class="form-label" >Lokasi Aset</label>
        <select name="lokasi_asset" class="form-control @error('lokasi_asset') is-invalid @enderror" required >
          @foreach ($lokasiAsset as $la)
          <option value="{{ $la->mla_lokasi_asset }}" 
          {{ $la->mla_lokasi_asset == $asset->as_mla_id ? 'selected="selected"' : '' }}>
          {{ $la->mla_lokasi_asset}}</option>
          @endforeach    
        </select>
        @error('lokasi_asset')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 mb-3 mb-sm-2 pr-lg-2">
        <label for="as_kode_asset" class="form-label" >Kode Aset</label>
        <input type="text" class="form-control @error('kode') is-invalid @enderror" name="as_kode_asset" value="{{ $asset->as_kode_asset }}" required readonly >
        @error('kode')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <!-- <div class="col-lg-6 mb-3 mb-sm-2">
        <label for="tahun_pembelian_asset" class="form-label" d>Tahun Pembelian</label>
        <input type="number" min="1900" class="form-control @error('tahun_pembelian_asset') is-invalid @enderror" name="tahun_pembelian_asset" value="{{ $asset->as_tahun_kepemilikan }}" required d>
        @error('tahun_pembelian_asset')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div> -->
      <!-- <div class="col-lg-6 mb-3 mb-sm-2">
        <label class="form-label" >Bulan Pembelian</label>
        <select name="bulan_pembelian_asset" class="custom-select custom-select-md" >
          <option value="{{ $asset->as_bulan }}">Pilih Bulan</option>
          <option value="-01">Januari</option>
          <option value="-02">Februari</option>
          <option value="-03">Maret</option>
          <option value="-04">April</option>
          <option value="-05">Mei</option>
          <option value="-06">Juni</option>
          <option value="-07">Juli</option>
          <option value="-08">Agustus</option>
          <option value="-09">September</option>
          <option value="-10">Oktober</option>
          <option value="-11">November</option>
          <option value="-12">Desember</option>
        </select>
      </div> -->
      <div class="col-lg-6 mb-3 mb-sm-2 pl-lg-2">
        <label for="harga_asset" class="form-label" >Harga Aset</label>
        <input type="number" min="1" class="form-control @error('harga_asset') is-invalid @enderror" name="harga_asset" value="{{ $asset->as_harga }}" required >
        @error('harga_asset')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <!-- <div class="col-lg-6 mb-3 mb-sm-2">
        <label for="as_umur_manfaat" class="form-label">Umur Manfaat Asset</label>
        <input type="text" class="form-control @error('umur') is-invalid @enderror" name="as_umur_manfaat" value="{{ $asset->as_umur_manfaat }}" required>
        @error('umur')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div> -->
      <div class="col-lg-6 mb-3 mb-sm-2 pr-lg-2">
        <label for="umur_manfaat_asset" class="form-label" >Umur Manfaat Aset</label>
        <select name="umur_manfaat_asset" class="form-control @error('umur_manfaat_asset') is-invalid @enderror" required >
          <option value="{{ $asset->umur_manfaat_asset }}">{{ $asset->as_umur_manfaat }} tahun</option>
          <option value="4">4 tahun</option>
          <option value="8">8 tahun</option>
          <option value="12">12 tahun</option>
          <option value="16">16 tahun</option>
          <option value="20">20 tahun</option>
        </select>
        @error('umur_manfaat_asset')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 mt-sm-4 mt-2 pl-lg-2">
        <button class="btn btn-info mr-1 mt-sm-2">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_asset.index') }}" class="text-white text-decoration-none">Kembali</a>
        </button>
        <button type="submit" class="btn btn-success mt-sm-2">
          <i class="fa fa-edit"></i>
          Edit
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

               <!--  <label for="as_mla_id" class="form-label">Lokasi Asset</label>
               <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="as_mla_id" value="{{ $asset->as_mla_id }}" required>
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror -->

                

              
                

    

