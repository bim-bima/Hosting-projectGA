@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid px-0">
  <div class="card" data-aos="fade-up" data-aos-delay="50">
    <div class="card-header px-sm-3 px-1">
      <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">List Perencanaan Aktivitas</h6>
    </div>
    <div class="row d-flex px-2 pb-0 pt-2">

      <!-- Management -->

      @if(auth()->user()->level == "management")
      <div class="card-body col-xl-7 pb-2 px-3" data-aos="fade-left" data-aos-delay="150">

        @if($cek == 0)
        <div class="col-12 px-0">
          <div class="card mb-3 border-danger">
            <div class="card-body">
              <div class="row">
                <div class="col-12 px-1">
                  <div class="text-center">
                    <i class="fas fa-info-circle"></i>
                    <i>Belum Ada Data Perencanaan Disini</i>
                  </div>
                </div>                      
              </div>
            </div>
          </div>
        </div>
        @endif

        @foreach ($dataperencanaan as $perencanaan)
        <div class="card mb-3">
          <div class="card-body pt-3 pb-2">
            <div class="row d-flex justify-content-between">
              <div class="">
                <?php 
                $string = $perencanaan->ap_bulan;
                $result = preg_replace("/[^0-9]/", "",$string);

                $monthnum = $result;
                $dateObj = DateTime::createFromFormat('!m', $monthnum);
                $monthName = $dateObj->format('F');
                ?>
                <h5 class="card-title">{{ $monthName.'-'.$perencanaan->ap_tahun }}</h5>
              </div>
              <div class="">
                <a href="{{ route('app_perencanaan.show',$perencanaan->id) }}" class="btn-sm btn-primary btn-circle">
                  <i class="fas fa-eye"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{ $dataperencanaan->links() }}
      </div>
      @endif
      
      <!-- End management -->


      <!-- General Affair -->

      @if(auth()->user()->level == "general-affair")
      <div class="card-body col-lg-7 pb-2 px-sm-3 px-2">
        
        @if($cek == 0)
        <div class="col-12 px-0">
          <div class="card mb-3 border-danger">
            <div class="card-body">
              <div class="row">
                <div class="col-12 px-1">
                  <div class="text-center">
                    <i class="fas fa-info-circle"></i>
                    <i>Belum Ada List Perencanaan</i>
                  </div>
                </div>                      
              </div>
            </div>
          </div>
        </div>
        @endif

        @foreach ($dataperencanaan as $perencanaan)
        <div class="card mb-3">
          <div class="card-body pt-3 pb-2">
            <div class="row d-flex justify-content-between px-0">
              <div class="col-sm-5 px-1 py-1">
                <?php 
                $string = $perencanaan->ap_bulan;
                $result = preg_replace("/[^0-9]/", "",$string);

                $monthnum = $result;
                $dateObj = DateTime::createFromFormat('!m', $monthnum);
                $monthName = $dateObj->format('F');
                // use Carbon\Carbon;
                // $bulan = Carbon::parse($result)->translatedFormat('F');
                // $bulan = $result->translatedFormat('F');
                ?>
                <h5 class="card-title">{{ $monthName.'-'.$perencanaan->ap_tahun }}</h5>
              </div>
              <div class="py-1 px-1">
                <a href="{{ route('app_perencanaan.show',$perencanaan->id) }}" class="btn-sm btn-info btn-circle"  data-toggle="tooltip" data-placement="left" title="Lihat">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('app_perencanaan.edit',$perencanaan->id) }}" class="btn-sm btn-success btn-circle"  data-toggle="tooltip" data-placement="left" title="Unduh">
                  <i class="fas fa-download"></i>
                </a>
                <form action="{{ route('app_perencanaan.destroy',$perencanaan->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  
                  <button type="submit" class="btn-sm border-0 btn-circle btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                  
                  </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{ $dataperencanaan->links() }}
      </div>

      <div class="card-body col-lg-5 pb-2 mb-2 pr-sm-4 pr-2 pl-sm-2 pl-2">
        <div class="card">
          <div class="card-header px-sm-3 px-2">
            <h6 class="font-weight-bold text-primary">Tambah List Perencanaan</h6>
          </div>
          <div class="card-body pt-3 px-sm-3 px-2">
            <form class="px-0" action="{{ route('app_perencanaan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label class="form-label">Bulan</label>
              <select name="ap_bulan" required class="custom-select custom-select-md mb-3">
                <option value="">Pilih Bulan</option>
                <option value="-01">Januari</option>
                <option value="-02">Februari</option>
                <option value="-03">Maret</option>
                <option value="-04">April</option>
                <option value="-05">Mei</option>
                <option value="-06">Juni</option>
                <option value="-07">Juli</option>
                <option value="-08">Agustus</option>
                <option value="-09">September</option>
                <option value="-10">Oktober</option>
                <option value="-11">November</option>
                <option value="-12">Desember</option>
              </select>
              <label class="form-label">Tahun</label>
              <input name="ap_tahun" min="1" type="number" class="form-control @error('ap_tahun') is-invalid @enderror" required autofocus value="{{ old('ap_tahun') }}">
              @error('ap_tahun')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror                 
              <button type="submit" class="btn btn-success mt-4">
                <i class="fa fa-plus-circle"></i>
                Tambah
              </button>
            </form>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

