@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Asset</h6>
  </div>
  <?php   
      // 'asset','tahunawal','tahunakhir','harga','residu','umur','penurunan1','penurunan2'
        $penurunan = array();  
        for ( $p=$harga; $p>=$penurunan1; $p-=$penurunan2 ){
            $penurunan[] = array($p);
          }
        $tahun = array();  
        for ( $i=$tahunawal;  $i<=$tahunakhir;  $i++ ){
            $tahun[] = array($i);
        }
    ?>  
    <div class="row">
      <div class="card-body col-lg-9 pb-0 pr-1" style="width: 700px;">
        <canvas id="grafik"></canvas>
      </div>

      <script>
        var ctx = document.getElementById("grafik").getContext('2d');
        var grafik = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: {{ json_encode($tahun) }},
              datasets: [{
              label: 'Penyusutan Harga {{ $asset->as_nama_asset }}',
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
      <div class="card-body col-lg-3 pl-0 pr-4">
        <ol class="list-group list-group-numbered mr-1">
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Nama Asset :</small></div>
              <b>{{ $asset->as_nama_asset }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Lokasi Asset :</small></div>
              <b>{{ $asset->lokasiAsset->mla_lokasi_asset }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Tahun kepemilikan :</small></div>
              <b>{{ $asset->as_tahun_kepemilikan }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Kode Asset :</small></div>
              <b>{{ $asset->as_kode_asset }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Harga Asset :</small></div>
              <b>{{ $asset->as_harga }}</b>
            </div>
          </li> 
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto">
              <div class="fs-6"><small>Nilai Residu :</small></div>
              <b>{{ $asset->as_nilai_residu }}</b>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-start pb-0 pt-1">
            <div class="ms-2 me-auto pb-2">
              <div class="fs-6"><small>Umur Manfaat :</small></div>
              <b>{{ $asset->as_umur_manfaat }}</b>
            </div>
          </li>
        </ol>
      </div>
    </div>
      <div class="col-1 pt-3 pb-2">
        <button class="btn btn-info mb-3 mr-1">
          <i class="fa fa-angle-left"></i>
          <a href="{{ route('app_asset.index') }}" class="text-white text-decoration-none">Kembali</a>
        </button>
    </div> 
  </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

</script>

@endsection

