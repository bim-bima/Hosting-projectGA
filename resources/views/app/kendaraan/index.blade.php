@extends('layouts.main')

@section('content')

@include('sweetalert::alert')


<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Pemakaian Kendaraan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="row">          
      @foreach( $datakendaraan as $ken )
        <?php
        $id = $ken->id;

        ?>
        <div class="col-xl-4">
          <div class="card mb-3">
            <a href="#collapseCardExample{{ $id }}" class="d-block card-header py-3 px-sm-3 px-2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample{{ $id }}">
              <h6 class="m-0 font-weight-bold text-primary">{{ $ken->mk_nama_kendaraan }}</h6>
            </a>
            @if(auth()->user()->level == "general-affair")
            <div class="collapse hide" id="collapseCardExample{{ $id }}">
            @endif
            @if(auth()->user()->level == "management")
            <div class="collapse show" id="collapseCardExample{{ $id }}">
            @endif

              <div class="card-body">
                <!-- <div class="row ml-3">
                <p class="small text-primary">Nama Kendaraan :</p> 
                <p class="ml-3 font-weight-bold text-lg">{{ $ken->mk_nama_kendaraan }}</p>
                </div> -->
                <div class="row ml-sm-1">
                <p class="small text-primary">Kilometer Kendaraan :</p>
                <p class="ml-3 font-weight-bold"> {{ $ken->mk_kilometer }} Km</p>
                </div>
                <div class="row ml-sm-1">
                <p class="small text-primary">Bahan Bakar Tersedia : </p> 
                <p class="ml-3 font-weight-bold">{{ $ken->mk_bahan_bakar }} Liter</p>
                </div>
                <div class="row ml-sm-1">
                <p class="small text-primary">Catatan : </p> 
                <p class="ml-3 font-weight-bold">{{ $ken->mk_kondisi_lain }}</p>
                </div>
                <a href="{{ route('master_kendaraan.show',$ken->id) }}" class="btn btn-info btn-block"></i>Detail</a>
  
                @if(auth()->user()->level == "general-affair")
                <a href="{{ route('master_kendaraan.edit',$ken->id) }}" class="btn btn-warning btn-block"></i>Update</a>
                @endif

              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="col-12 px-0">          
      @if(auth()->user()->level == "general-affair")
      <button class="btn btn-primary mb-3"> 
        <i class="fa fa-plus"></i>
        <a href="{{ route('app_kendaraan.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
      @endif

      <div class="table-responsive">
        @if(auth()->user()->level == "general-affair")
        @if($cek == 0)
          <div class="col px-0">
            <div class="card border-danger mb-2">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 px-0">
                    <div class="text-center">
                      <i class="fas fa-info-circle"></i>
                      <i>Belum Ada Riwayat Booking Disini</i>
                    </div>
                  </div>                      
                </div>
              </div>
            </div>
          </div>
        @endif
        @endif

        @if($cek > 0)
        @if(auth()->user()->level == "general-affair")
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
          <thead>
            <tr class="bg-primary text-light">
              <th class="border px-2">Kendaraan</th>
              <th class="border px-2">Pengguna</th>
              <th class="border px-2">Tanggal Mulai</th>
              <th class="border px-2">Jam Mulai</th>
              <th class="border px-2">Lokasi Tujuan</th>
              <th class="border px-2">Tujuan Pemakaian</th>
              <th class="border px-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraan as $item)
            <?php 
              $jam_mulai = substr($item->ak_jam,-0,5);
              $jam_selesai = substr($item->ak_jam_selesai,-0,5);

              $tanggal1 = $item->ak_tanggal_mulai;
              $tanggal = substr($tanggal1,-0,10);
              $tanggal_mulai = date('d M, Y',strtotime($tanggal1));
            ?>
            <tr>
              <input type="hidden" class="delete_id" value="{{ $item->id }}">
              <td class="border px-2">{{ $item->ak_mk_id }}</td>
              <td class="border px-2">{{ $item->ak_pengguna }}</td>
              <td class="border px-2">{{ $tanggal_mulai }}</td>
              <td class="border px-2">{{ $jam_mulai }}</td>
              <td class="border px-2">{{ $item->ak_lokasi_tujuan }}</td>
              <td class="border px-2">{{ $item->ak_tujuan_pemakaian }}</td>
              <td class="border px-2">
                <a class="btn btn-info btn-circle btn-sm mb-2" href="{{ route('app_kendaraan.show',$item->id) }}"  data-toggle="tooltip" data-placement="left" title="show"> 
                  <i class="fas fa-eye"></i>
                </a>
              
                <form action="{{ route('app_kendaraan.destroy',$item->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndeleteitem" type="submit" value="Delete"> --}}
                  <a href="" class="btn btn-danger btn-circle btn-sm  btndeleteitem mb-2"  data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
        @endif
      </div>
    </div>
  </div>
</div>
@endsection