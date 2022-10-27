@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Jenis Barang</h6>
    <button class="btn btn-primary mt-2">
      <i class="fa fa-plus"></i>
      <a href="{{ route('master_jenisbarang.create') }}" class="text-white text-decoration-none">Tambah</a>
    </button>
  </div>
  <div class="card-body px-sm-3 px-1">
    <div class="row">
      <div class="table-responsive col-xl-7">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="border border-secondary col-4 col-sm-7 col-md-9">Nama Jenis Barang</th>
              <th class="border border-secondary col-4 col-sm-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datajenisbarang as $jenisbarang)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $jenisbarang->id }}">
              <td class="border-secondary">{{ $jenisbarang->mjb_jenis_barang }}</td>
              <td class="border-secondary">
                <a class="btn-sm btn-warning btn-circle mb-sm-0 mb-1" href="{{ route('master_jenisbarang.edit',$jenisbarang->id) }}"  data-toggle="tooltip" data-placement="left" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('master_jenisbarang.destroy',$jenisbarang->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete6" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-sm-0 mb-1 btndelete6"  data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $datajenisbarang->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

