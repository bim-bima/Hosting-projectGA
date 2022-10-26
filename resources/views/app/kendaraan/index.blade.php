@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Cek Kendaraan</h6>
      @if(auth()->user()->level == "general-affair")
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('app_kendaraan.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
      @endif
    </div>
    <div class="card-body">
      <div class="row">
          @foreach( $datakendaraan as $ken )
            <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card h-100 ">
                    <div class="card-header py-2">
                  <h6 class="m-0 font-weight-bold text-primary text-center">{{ $ken->mk_nama_kendaraan }}</h6>
                  </div>
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase ">Status</div>

                          {{-- <div class="text-xs mb-0 font-weight-bold text-primary-800">
                            {{ $ken->mk_status }}
                          </div> --}}

                        <div class=" h5 mb-0 font-weight-bold text-gray-800">
                        {{$ken->mk_status}}
                        </div>

                        </div>
                        
                      </div>

                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase ">Bahan Bakar Tersedia</div>
                        <div class=" h5 mb-0 font-weight-bold text-gray-800">{{ $ken->mk_bahan_bakar }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>

                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase ">Kilometer</div>
                        <div class=" h5 mb-0 font-weight-bold text-gray-800">{{ $ken->mk_kilometer }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>

                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase ">Kondisi Lain</div>
                        <div class=" h5 mb-0 font-weight-bold text-gray-800">{{ $ken->mk_kondisi_lain }}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                      @if(auth()->user()->level == "general-affair")
                      <a class="mt-3 btn btn-warning px-5" href="{{ route('master_kendaraan.edit',$ken->id) }}">Update</a>
                      @endif
                    </div>
                  </div>
                </div>
            @endforeach
                </div>

                 
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Kendaraan</th>
                <th>Pengguna</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>PIC</th>
                <th>Kondisi</th>
                <th>Menuju</th>
                <th>Tujuan</th>
                @if(auth()->user()->level == "general-affair")
                <th>Aksi</th>
                @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraan as $item)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $item->id }}">
              <td>{{ $item->namaKendaraan->mk_nama_kendaraan }}</td>
              <td>{{ $item->ak_pengguna }}</td>
              <td>{{ $item->ak_tanggal_mulai }}</td>
              <td>{{ $item->ak_jam }}</td>
              <td>{{ $item->pic->mp_nama }}</td>
              <td>{{ $item->ak_kondisi }}</td>
              <td>{{ $item->ak_lokasi_tujuan }}</td>
              <td>{{ $item->ak_tujuan_pemakaian }}</td>
              @if(auth()->user()->level == "general-affair")
              <td>
                <a class="btn btn-warning btn-circle btn-sm mb-xxl-0 mb-2" href="{{ route('app_kendaraan.edit',$item->id) }}">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ route('app_kendaraan.destroy',$item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    {{-- <input class="btn btn-danger btndeleteitem" type="submit" value="Delete"> --}}
                    <a href="" class="btn btn-danger btn-circle btn-sm  btndeleteitem mb-xxl-0 mb-2">
                      <i class="fas fa-trash"></i>
                    </a>
                </form>
                </td>
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
       {{ $kendaraan->links() }}

      </div>
    </div>
  </div>
@endsection

