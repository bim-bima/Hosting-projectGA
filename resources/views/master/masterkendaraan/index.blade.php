@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Kendaraan</h6>
    <button class="btn btn-primary mt-2">
      <i class="fa fa-plus"></i>
      <a href="{{ route('master_kendaraan.create') }}" class="text-white text-decoration-none">Tambah</a>
    </button>
  </div>
  <div class="card-body px-sm-3 px-1">
    <div class="table-responsive">
      @if($cek == 0)
      <div class="col px-0">
        <div class="card border-danger mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="text-center">
                  <i class="fas fa-info-circle"></i>
                  <i>Belum Ada Data Kendaraan Disini</i>
                </div>
              </div>                      
            </div>
          </div>
        </div>
      </div>
      @endif

      @if($cek > 0)
      <table class="table table-bordered shadow-0" id="table" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-primary text-light">
            <th class="border">Nama Kendaraan</th>
            <th class="border">No Polisi</th>
            <th class="border">Jenis</th>
            <th class="border">Merk</th>
            <th class="border">Warna</th>
            <th class="border">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datakendaraan as $kendaraan)
          <tr>
            <input type="hidden" class="delete_id" value="{{ $kendaraan->id }}">
            <td class="border">{{ $kendaraan->mk_nama_kendaraan }}</td>
            <td class="border">{{ $kendaraan->mk_no_polisi }}</td>
            <td class="border">{{ $kendaraan->mk_jenis }}</td>
            <td class="border">{{ $kendaraan->mk_merk }}</td>
            <td class="border">{{ $kendaraan->mk_warna }}</td>
            <td class="border">
              <a class="btn-sm btn-warning btn-circle mb-xl-0 mb-1" href="{{ route('master_kendaraan.edit',$kendaraan->id) }}"  data-toggle="tooltip" data-placement="left" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
              <form action="{{ route('master_kendaraan.destroy',$kendaraan->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                {{-- <input class="btn btn-danger btndelete" type="submit" value="Delete"> --}}
                <a href="" class="btn-sm btn-danger btn-circle mb-xl-0 mb-1 btndelete"  data-toggle="tooltip" data-placement="left" title="Delete">
                  <i class="fas fa-trash"></i>
                </a>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{ $datakendaraan->links() }} --}}
      @endif
    </div>
  </div>
</div>
@endsection

