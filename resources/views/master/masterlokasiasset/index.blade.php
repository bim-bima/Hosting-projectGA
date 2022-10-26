@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Lokasi Asset</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('master_lokasiasset.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="table-responsive col-md-8">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Lokasi Asset</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datalokasiasset as $lokasiasset)
              <tr>
                <input type="hidden" class="delete_id" value="{{ $lokasiasset->id }}">
                <td>{{ $lokasiasset->mla_lokasi_asset }}</td>
                <td>
                  <a class="btn btn-warning btn-circle mb-sm-0 mb-2" href="{{ route('master_lokasiasset.edit',$lokasiasset->id) }}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('master_lokasiasset.destroy',$lokasiasset->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      {{-- <input class="btn btn-danger btndelete8" type="submit" value="Delete"> --}}
                      <a href="" class="btn btn-danger btn-circle btndelete8 mb-sm-0 mb-2">
                        <i class="fas fa-trash"></i>
                      </a>
                  </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $datalokasiasset->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

