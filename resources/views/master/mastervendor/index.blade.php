@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Vendor</h6>
    <button class="btn btn-primary mt-2">
      <i class="fa fa-plus"></i>
      <a href="{{ route('master_vendor.create') }}" class="text-white text-decoration-none">Tambah</a>
    </button>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="row">
      @if($cek == 0)
      <div class="col">
        <div class="card border-danger mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="text-center">
                  <i class="fas fa-info-circle"></i>
                  <i>Belum Ada Data Vendor Disini</i>
                </div>
              </div>                      
            </div>
          </div>
        </div>
      </div>
      @endif

      @if($cek > 0)
      <div class="table-responsive col-12">
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
          <thead>
            <tr class="bg-primary text-light">
              <th class="border col-4 col-sm-5">Nama Vendor</th>
              <th class="border col-3 col-sm-4">Lokasi Vendor</th>
              <th class="border col-3 col-sm-3 col-md-2 col-xl-1">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datavendor as $vendor)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $vendor->id }}">
              <td class="border">{{ $vendor->mv_nama_vendor }}</td>
              <td class="border">{{ $vendor->mv_lokasi }}</td>
              <td class="border">
                <a class="btn-sm btn-warning btn-circle mb-sm-0 mb-1" href="{{ route('master_vendor.edit',$vendor->id) }}" data-toggle="tooltip" data-placement="left" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('master_vendor.destroy',$vendor->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete4" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-sm-0 mb-1 btndelete4" data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- {{ $datavendor->links() }} --}}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

