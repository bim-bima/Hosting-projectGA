@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<?php 

$jam_mulai = substr($kendaraan->ak_jam,-0,5);
$jam_selesai = substr($kendaraan->ak_jam_selesai,-0,5);

$tanggal1 = $kendaraan->ak_tanggal_mulai;
$tanggal1 = $kendaraan->ak_tanggal_selesai;
$tanggal = substr($tanggal1,-0,10);
$tanggal_mulai = date('d M, Y',strtotime($tanggal1));
$tanggal_selesai = date('d M, Y',strtotime($tanggal1));

 ?>
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Riwayat Booking Kendaraan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-primary text-light">
            <th class="border px-sm-2">Kendaraan</th>
            <th class="border px-sm-2">Pengguna</th>
            <th class="border px-sm-2">Tanggal Mulai</th>
            <th class="border px-sm-2">Jam Mulai</th>
            <th class="border px-sm-2">Tanggal Selesai</th>
            <th class="border px-sm-2">Jam Selesai</th>
            <th class="border px-sm-2">Menuju</th>
            <th class="border px-sm-2">Tujuan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border px-2">{{ $kendaraan->ak_mk_id }}</td>
            <td class="border px-2">{{ $kendaraan->ak_pengguna }}</td>
            <td class="border px-2">{{ $tanggal_mulai }}</td>
            <td class="border px-2">{{ $jam_mulai }}</td>
            <td class="border px-2">{{ $tanggal_selesai }}</td>
            <td class="border px-2">{{ $jam_selesai }}</td>
            <td class="border px-2">{{ $kendaraan->ak_lokasi_tujuan }}</td>
            <td class="border px-2">{{ $kendaraan->ak_tujuan_pemakaian }}</td>
          </tr>
        </tbody>
      </table>
      @if(auth()->user()->level == "pegawai")
      <button class="btn btn-info my-3 mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="/home" class="text-white text-decoration-none">Kembali</a>
      </button>
      @endif
        @if(auth()->user()->level == "general-affair")
        <button class="btn btn-info my-3 mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_kendaraan.index') }}"class="text-white text-decoration-none">Kembali</a>
        </button>
        @endif

    </div>
  </div>
</div>
@endsection