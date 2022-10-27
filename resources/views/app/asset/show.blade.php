@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Aset</h6>
  </div>
  <?php  
        $tahuntahun = $asset->as_tanggal;
        $tahunawall = date('Y',strtotime($tahuntahun));
        $tahunawal = intval($tahunawall);
        $tahunakhir = $tahunawal + $asset->as_umur_manfaat;
        $harga = $asset->as_harga;
        $umur = $asset->as_umur_manfaat;
        $penurunan1 = $harga / $umur;

        $penurunan = array();  
        for ( $p=$harga; $p>=0; $p-=$penurunan1 ){
            $penurunan[] = array($p);
          }
          
        $tahun = array();  
        for ( $i=$tahunawal;  $i<=$tahunakhir;  $i++ ){
            $tahun[] = array($i);
        }
  ?>  
  <div class="container p-0">
    <div class="row">
      <div class="card-body col-xl-9 pr-xl-1 px-3 pb-0" data-aos="fade-right" data-aos-delay="150">
        <canvas id="grafik"></canvas>
        <script>
          var ctx = document.getElementById("grafik").getContext('2d');
          var grafik = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: {{ json_encode($tahun) }},
              // labels: ["kopi","susu","kopi","teh"],
                datasets: [{
                label: 'Penyusutan {{ $asset->as_nama_asset }}',
                data: {{ json_encode($penurunan) }},
                backgroundColor: 'rgba(255, 159, 64)' ,
                borderColor: 'black',
                
                borderWidth:1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero:true
                  }
                }]
              }
            }
          });
        </script> 
      </div>
      <div class="card-body col-xl-3 mt-xl-2 pl-xl-0 pr-xl-4 pb-0" data-aos="fade-left" data-aos-delay="150">
        <ol class="list-group list-group-numbered">
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
          <div class="">
              <div class="text-primary font-weight-bold">Nama Aset :</div>
              <b>{{ $asset->as_nama_asset }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <div class="mr-auto">
              <div class="text-primary font-weight-bold">Lokasi Aset :</div>
              <b>{{ $asset->as_mla_id }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <div class="mr-auto">
              <div class="text-primary font-weight-bold">Kategori Aset :</div>
              <b>{{ $asset->as_mca_id }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <?php   
                $tgl_kepemilikan = $asset->as_tanggal;
                $tgl_kep = date('d M, Y',strtotime($tgl_kepemilikan));
             ?>
            <div class="mr-auto">
              <div class="text-primary font-weight-bold">Tanggal Kepemilikan :</div>
              <b>{{ $tgl_kep }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <div class="mr-auto">
              <div class="text-primary font-weight-bold">Kode Aset :</div>
              <b>{{ $asset->as_kode_asset }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <?php 
            $harga1 = $asset->as_harga;
            $harga = number_format($harga1,0,",",",");
            $tgl1 = $asset->as_tanggal;
            $tgl2 = date('y-m-d',strtotime('+'.$umur.'years',strtotime($tgl1))); 
            $tgl_kepemilikan = $asset->as_tanggal;
            $tgl_kep = date('d M, Y',strtotime($tgl_kepemilikan));
            $tgl_lep = date('d M, Y',strtotime($tgl2));

           ?>
            <div class="mr-auto">
              <div class="text-primary font-weight-bold">Harga Aset :</div>
              <b>{{ $harga }}</b>
            </div>
          </li> 
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="pb-2">
              <div class="text-primary font-weight-bold">Umur Manfaat :</div>
              <b>{{ $asset->as_umur_manfaat }} tahun
              </b>
              <b><small>( {{ $tgl_lep }} )</small></b>
            </div>
          </li>
        </ol>
      </div>
    </div>
    <div class="col-1 py-2">
      <button class="btn btn-info mt-3 mb-3 mr-1">
        <i class="fa fa-angle-left"></i>
        <a href="{{ route('app_asset.index') }}" class="text-white text-decoration-none">Kembali</a>
      </button>
    </div> 
  </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script></script>

@endsection
