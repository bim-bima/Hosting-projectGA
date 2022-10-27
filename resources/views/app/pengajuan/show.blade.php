@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">{{ $pengajuan->ap_nama_pengajuan }}</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr class="bg-primary text-light">
          <th class="border px-2">Tanggal</th>
          <th class="border px-2">Nama Pengajuan</th>
          <th class="border px-2">Jenis</th>
          <th class="border px-2">Vendor</th>
          <th class="border px-2">Biaya (Rp)</th>
          <th class="border px-2">Catatan</th>
          <th class="border px-2">Tanggal Estimasi</th>
          <th class="border px-2">Status</th>
          <th class="border px-2">Alasan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $harga1 = $pengajuan->ap_biaya;
            $harga = number_format($harga1,0,",",",");

            $tanggal1 = $pengajuan->created_at;
            $tanggal = substr($tanggal1,-0,10);
            $tanggal_pengajuan = date('d M, Y',strtotime($tanggal1));

            $tanggal2 = $pengajuan->ap_tanggal_pengadaan;
            $tanggal = substr($tanggal2,-0,10);
            $tanggal_estimasi = date('d M, Y',strtotime($tanggal2));
        ?>
        <tr>
          <td class="border px-2">{{ $tanggal_pengajuan }}</td>
          <td class="border px-2">{{ $pengajuan->ap_nama_pengajuan }}</td>
          <td class="border px-2">{{ $pengajuan->ap_mjp_id }}</td>
          <td class="border px-2">{{ $pengajuan->ap_mv_id }}</td>
          <td class="border px-2">{{ $harga }}</td>
          <td class="border px-2">{{ $pengajuan->ap_catatan }}</td>
          <td class="border px-2">{{ $tanggal_estimasi }}</td>
          <td class="border px-2">{{ $pengajuan->ap_status }}</td>
          <td class="border px-2">{{ $pengajuan->ap_reason }}</td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-info mb-1 mt-2 ml-1">
      <i class="fa fa-angle-left"></i>
      <a href="{{ route('app_pengajuan.index') }}" class="text-white text-decoration-none">Kembali</a>
    </button>
  </div>
</div>
@endsection

