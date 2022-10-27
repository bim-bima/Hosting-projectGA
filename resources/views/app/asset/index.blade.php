@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Daftar Aset</h6>
    @if(auth()->user()->level == "general-affair")
    <button class="btn btn-primary mt-2" data-aos="fade-right" data-aos-delay="150">
      <i class="fa fa-plus"></i>
      <a href="{{ route('app_asset.create') }}" class="text-white text-decoration-none">Tambah</a>
    </button>
    @endif      
  </div>
  <div class="card-body px-sm-3 px-2">
    
    @if($cek == 0)
    <div class="col-12 px-0">
      <div class="card mb-3 border-danger">
        <div class="card-body">
          <div class="row">
            <div class="col-12 px-1">
              <div class="text-center">
                <i class="fas fa-info-circle"></i>
                <i>Belum Ada Data Aset Disini</i>
              </div>
            </div>                      
          </div>
        </div>
      </div>
    </div>
    @endif

    @if($cek > 0)
    <div class="table-responsive">
      <table class="table table-bordered" id="table" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-primary text-light">
            <th class="border col-lg-1 px-2">Nama Aset</th>
            <th class="border col-lg-1 px-2">Lokasi Aset</th>
            <th class="border col-lg-1 px-2">Tanggal Kepemilikan</th>
            <th class="border col-lg-1 px-2">Kode Aset</th>
            <th class="border col-lg-1 px-2">Harga Aset</th>
            <th class="border col-lg-1 px-2">Kategori</th>
            <th class="border col-lg-1 px-2">Umur Manfaat</th>
            <th class="border col-lg-1 px-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataasset as $asset)
          <?php 
            $harga1 = $asset->as_harga;
            $harga = number_format($harga1,0,",",",");
            $tgl1 = $asset->as_tanggal;
            $umur =  $asset->as_umur_manfaat;
            $tgl2 = date('y-m-d',strtotime('+'.$umur.'years',strtotime($tgl1))); 
            $tgl_kepemilikan = $asset->as_tanggal;
            $tgl_kep = date('d M, Y',strtotime($tgl_kepemilikan));
            $tgl_lep = date('d M, Y',strtotime($tgl2));
           ?>
          <tr>
            <input type="hidden" class="delete_id" value="{{ $asset->id }}">
            <td class="border px-2">{{ $asset->as_nama_asset }}</td>
            <td class="border px-2">{{ $asset->as_mla_id }}</td>
            <td class="border px-2">{{ $tgl_kep }}</td>
            <td class="border px-2">{{ $asset->as_kode_asset }}</td>
            <td class="border px-2">Rp {{ $harga }}</td>
            <td class="border px-2">{{ $asset->as_mca_id }}</td>
            <td class="border px-2">{{ $asset->as_umur_manfaat }} tahun
              <br><p class="small">( {{ $tgl_lep }} )</p></td>
            <td class="border px-2">
              <a class="btn-sm btn-info btn-circle mb-xl-0 mb-1" href="{{ route('app_asset.show',$asset->id) }}"  data-toggle="tooltip" data-placement="left" title="Info">
                <i class="fas fa-eye"></i>
              </a>
              @if(auth()->user()->level == "general-affair")
              <a class="btn-sm btn-warning btn-circle mb-1" href="{{ route('app_asset.edit',$asset->id) }}"  data-toggle="tooltip" data-placement="left" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
              <form action="{{ route('app_asset.destroy',$asset->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn-danger btn-circle btn-sm border-0 btndeleteasset" type="submit"><i class="fas fa-trash"></i>
                </button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{ $dataasset->links() }} --}}
    </div>

      

    @endif
  </div>
</div>
@endsection

