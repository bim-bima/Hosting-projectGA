@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="100">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="150">List Aktivitas</h6>
    <button class="btn btn-info mt-3" data-aos="fade-right" data-aos-delay="150">
      <i class="fas fa-angle-left"></i>
      <a href="{{ route('app_perencanaan.index') }}" class="text-white text-decoration-none">Kembali</a>
    </button>
    <button class="btn btn-success mt-3" data-aos="fade-right" data-aos-delay="150">
      <i class="fas fa-download"></i>
      <a href="{{ url('downloadlist') }}" class="text-white text-decoration-none">Unduh</a>
    </button>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="table-responsive">
      <?php 
      // use App\Models\Aktivitas;
      // $listaktivitas = Aktivitas::paginate(10);
          // echo $mytime->toDateString();
      
      ?>     
      @if($cek == 0)
      <div class="col px-0">
        <div class="card border-danger mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-12 px-0">
                <div class="text-center">
                  <i class="fas fa-info-circle"></i>
                  <i>Belum Ada Data Disini</i>
                </div>
              </div>                      
            </div>
          </div>
        </div>
      </div>
      @endif

      @if($cek > 0)   
      <table class="table table-bordered" id="table" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-primary text-light">
            <th class="border">Tanggal</th>
            <th class="border">Aktivitas</th>
            <th class="border">Prioritas</th>
            <th class="border">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $listaktivitas)
          <tr>
            <td class="border">{{ $listaktivitas->start_date }}</td>
            <td class="border">{{ $listaktivitas->title }}</td>
            <td class="border">{{ $listaktivitas->prioritas }}</td>
            <td class="border">{{ $listaktivitas->deskripsi }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
      {{-- {{ $listaktivitas->links() }} --}}
    </div>
  </div>
</div>
@endsection
