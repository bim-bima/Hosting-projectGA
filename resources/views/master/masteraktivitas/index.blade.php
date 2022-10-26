@extends('layouts.main')

@section('content')
@include('sweetalert::alert')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Aktivitas</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('master_aktivitas.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="">Nama Aktivitas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dataaktivitas as $aktivitas)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $aktivitas->id }}">
              <td>{{ $aktivitas->ma_nama_aktivitas }}</td>
              <td>
                <a class="btn btn-warning btn-circle mb-sm-0 mb-2" href="{{ route('master_aktivitas.edit',$aktivitas->id) }}">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('master_aktivitas.destroy',$aktivitas->id) }}" method="post" class="d-inline">

                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete3" type="submit" value="Delete"> --}}
                  <a href="" class="btn btn-danger btn-circle mb-sm-0 mb-2 btndelete3">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $dataaktivitas->links() }}

      </div>
    </div>
  </div>
@endsection

