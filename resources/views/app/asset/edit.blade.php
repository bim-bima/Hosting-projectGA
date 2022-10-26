 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Asset</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('app_asset.update',$asset->id) }}" method="POST" enctype="multipart/form-data" class="row">
      @csrf
      @method('put')
      <div class="col-lg-6">
        <label for="as_nama_asset" class="form-label">Nama Asset</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="as_nama_asset" value="{{ $asset->as_nama_asset }}" required>
        @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_mla_id" class="form-label">Lokasi Asset</label>
        <select name="as_mla_id" class="form-control @error('as_mla_id') is-invalid @enderror" required>
          @foreach ($lokasiAsset as $la)
          <option value="{{ $la->id }}" 
          {{ $la->id == $asset->as_mla_id ? 'selected="selected"' : '' }}>
          {{ $la->mla_lokasi_asset}}</option>
          @endforeach    
        </select>
        @error('as_mla_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_kode_asset" class="form-label">Kode Asset</label>
        <input type="text" class="form-control @error('kode') is-invalid @enderror" name="as_kode_asset" value="{{ $asset->as_kode_asset }}" required>
        @error('kode')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_tahun_kepemilikan" class="form-label">Tahun Kepemilikan</label>
        <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="as_tahun_kepemilikan" value="{{ $asset->as_tahun_kepemilikan }}" required>
        @error('tahun')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_harga" class="form-label">Harga Asset</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="as_harga" value="{{ $asset->as_harga }}" required>
        @error('harga')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_nilai_residu" class="form-label">Nilai Residu</label>
        <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="as_nilai_residu" value="{{ $asset->as_nilai_residu }}" required>
        @error('nilai')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6">
        <label for="as_umur_manfaat" class="form-label">Umur Manfaat Asset</label>
        <input type="text" class="form-control @error('umur') is-invalid @enderror" name="as_umur_manfaat" value="{{ $asset->as_umur_manfaat }}" required>
        @error('umur')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-lg-6 pt-3">
        <button class="btn btn-info mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_asset.index') }}" class="text-white text-decoration-none">Kembali</a>
        </button>
        <button type="submit" class="btn btn-success my-3">
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

                

              
                

    

