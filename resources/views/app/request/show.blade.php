@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

@if(auth()->user()->level == "pegawai")
 <div style="margin-block-end: 190px">
@endif
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Detail Request</h6>
  </div>
  
  <div class="card-body px-sm-3 px-2">
    <div class="table-responsive border-dark mb-2">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-primary text-light">
            <th class="border px-2 col-sm-2">Tanggal</th>
            @if(auth()->user()->level == "general-affair")
            <th class="border px-2 col-sm-2">Perequest</th>
            @endif
            <th class="border px-2 col-sm-2">Request</th>
            <th class="border px-2 col-sm-2">Tingkat Kebutuhan</th>
            <th class="border px-2 col-sm-2">Catatan</th>
            <th class="border px-2 col-sm-2">Tanggal Estimasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
              $tanggal1 = $request->created_at;
              $tanggal = substr($tanggal1,-0,10);
              $tanggal_req = date('d M, Y',strtotime($tanggal1));

              $tanggal2 = $request->ar_tanggal_estimasi;
              $tanggal = substr($tanggal2,-0,10);
              $tanggal_estimasi = date('d M, Y',strtotime($tanggal2));
              ?>
            <td class="border px-2">{{ $tanggal_req }}</td>
            @if(auth()->user()->level == "general-affair")
            <td class="border px-2">{{ $request->ar_perequest }}</td>
            @endif
            <td class="border px-2">{{ $request->ar_request }}</td>
            <td class="border px-2">{{ $request->ar_kebutuhan }}</td>
            <td class="border px-2">{{ $request->ar_catatan }}</td>
            <td class="border px-2">{{ $tanggal_estimasi }}</td>
          </tr>
        </tbody>
      </table>
      
    </div>
    <div class="">
      <button class="btn btn-info mb-2">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('home') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
    </div>
  </div>
</div>
@if(auth()->user()->level == "pegawai")
</div>
@endif
@endsection