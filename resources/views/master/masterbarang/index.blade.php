@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('master_barang.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="table-responsive col-md-8">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="col-sm-5 col-3">Nama Barang</th>
                <th class="col-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($databarang as $barang)
              <tr>
                <input type="hidden" class="delete_id" value="{{ $barang->id }}">
                <td>{{ $barang->mb_nama_barang }}</td>
                <td>
                  <a class="btn btn-warning btn-circle mb-sm-0 mb-2" href="{{ route('master_barang.edit',$barang->id) }}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('master_barang.destroy',$barang->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    {{-- <input class="btn btn-danger btndelete5" type="submit" value="Delete"> --}}
                    <a href="" class="btn btn-danger btn-circle mb-sm-0 mb-2 btndelete5">
                      <i class="fas fa-trash"></i>
                    </a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $databarang->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

