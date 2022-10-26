@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Kendaraan</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('master_kendaraan.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Nama Kendaraan</th>
                <th>No Polisi</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Warna</th>
                <th>Perlengkapan</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datakendaraan as $kendaraan)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $kendaraan->id }}">
              <td>{{ $kendaraan->mk_nama_kendaraan }}</td>
              <td>{{ $kendaraan->mk_no_polisi }}</td>
              <td>{{ $kendaraan->mk_jenis }}</td>
              <td>{{ $kendaraan->mk_merk }}</td>
              <td>{{ $kendaraan->mk_warna }}</td>
              <td>{{ $kendaraan->mk_perlengkapan }}</td>
              <td>
                <a class="btn-sm btn-warning btn-circle mb-xl-0 mb-2" href="{{ route('master_kendaraan.edit',$kendaraan->id) }}">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ route('master_kendaraan.destroy',$kendaraan->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-xl-0 mb-2 btndelete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $datakendaraan->links() }}

      </div>
    </div>
  </div>
@endsection

