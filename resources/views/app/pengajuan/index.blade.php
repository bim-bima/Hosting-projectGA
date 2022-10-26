@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan</h6>
      @if(auth()->user()->level == "general_affair")
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('app_pengajuan.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pengajuan</th>
                <th>Jenis</th>
                <th>Vendor</th>
                <th>Biaya</th>
                <th>Catatan</th>
                <th>Tanggal Di Butuhkan</th>
                <th>PIC</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datapengajuan as $pengajuan)
            <tr>
              <td>{{ $pengajuan->created_at }}</td>
              <td>{{ $pengajuan->ap_nama_pengajuan }}</td>
              <td>{{ $pengajuan->ap_jenis_pengajuan }}</td>
              <td>{{ $pengajuan->vendor->mv_nama_vendor }}</td>
              <td>{{ $pengajuan->ap_biaya }}</td>
              <td>{{ $pengajuan->ap_catatan }}</td>
              <td>{{ $pengajuan->ap_tanggal_pengadaan }}</td>
              <td>{{ $pengajuan->pic->mp_nama }}</td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
       {{ $datapengajuan->links() }}

      </div>
    </div>
  </div>
@endsection

