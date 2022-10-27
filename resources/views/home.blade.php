@extends('layouts.main')
@section('content')
@if(auth()->user()->level == "management")
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
  </div>
  <div class="card-body px-sm-4">
    <div class="row px-sm-1">
      <div class="col-xl-6 px-0 mb-4">
        <h6 class="font-weight-bold text-primary mb-3">Riwayat Pengajuan</h6>
        <div class="table-responsive">
          @if($cekpengajuan == 0)
          <div class="col px-0">
            <div class="card mb-3 border-danger">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 px-1">
                    <div class="text-center">
                      <i class="fas fa-info-circle"></i>
                      <i>Belum Ada Riwayat Pengajuan</i>
                    </div>
                  </div>                      
                </div>
              </div>
            </div>
          </div>
          @endif
      
          @if($cekpengajuan > 0)
            <table class="table table-bordered" id="tableriwayat" width="100%" cellspacing="0">
              <thead>
                <tr class="bg-primary text-light">
                  <th class="border px-2 col-lg-2 col-1">Tanggal</th>
                  <th class="border px-2 col-lg-2 col-2">Nama Pengajuan</th>
                  <th class="border px-2 col-lg-3 col-2">Status</th>
                  <th class="border px-2 col-lg-2 col-1">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datapengajuan as $pengajuan)
                <tr>
                  <?php 
                    $tanggal1 = $pengajuan->created_at;
                    $tanggal = substr($tanggal1,-0,10);
                    $tanggal_pengajuan = date('d M, Y',strtotime($tanggal1));
                  ?>
                  <input type="hidden" class="delete_id" value="{{ $pengajuan->id }}">
                  <td class="px-2 border">{{ $tanggal_pengajuan }}</td>
                  <td class="px-2 border">{{ $pengajuan->ap_nama_pengajuan }}</td>
                  <td class="px-2 border">{{ $pengajuan->ap_status }}</td>
                  <td class="px-2 border">
                    <a class="btn-sm btn-info btn-circle mb-2" href="{{ route('app_pengajuan.show',$pengajuan->id) }}"  data-toggle="tooltip" data-placement="left" title="Info">
                      <i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('app_pengajuan.destroy',$pengajuan->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-circle btn-sm btndeletepengajuan" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          @endif
         {{-- {{ $datapengajuan->links() }} --}}
        </div>
      </div>
      <div class="col-xl-6 px-0 pl-xl-3">
        <div class="card mb-4">
          <!-- Card Header - Accordion -->
          <a href="#Aktivitas" class="d-block card-header py-3 px-sm-3 px-2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="Aktivitas">
            <h6 class="m-0 font-weight-bold text-primary">Aktivitas GA Hari Ini</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="Aktivitas">
            <div class="card-body px-sm-3 px-2" style="overflow-y: auto; max-height: 500px;">
              <table class="table table-bordered border" id="table" width="100%" cellspacing="0">
                <thead>
                  <tr class="bg-primary text-light">
                    <th class="border px-2 col-lg-5">Aktivitas</th>
                    <th class="border px-2 col-lg-2 col-3">Prioritas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($aktivitas as $today)
                  <tr>
                    <td class="border px-2">{{ $today->title }}</td>
                    <td class="border px-2">{{ $today->prioritas }}</td>
                  </tr>
                  @endforeach
                  @if($cekak == 0)
                  <tr class="text-center">
                    <td colspan="2" class="border px-2">
                      <i class="fas fa-info-circle"></i>
                      <i>Tidak Ada Aktivitas Untuk Hari Ini</i>
                    </td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if(auth()->user()->level == "general-affair")
<div class="card shadow mb-4 pb-3">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
  </div>
  <div class="card-body px-sm-4">
    <div class="row px-sm-1">
      <div class="col-xl-6 px-0">
        <h6 class="font-weight-bold text-primary mb-2">Aktivitas Hari Ini</h6>
        <div class="col-12 px-0" >
          <table class="table table-bordered border" id="table" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-light">
                <th class="border px-2 col-lg-6">Aktivitas</th>
                <th class="border px-2 col-2">Prioritas</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($aktivitas as $today)
              <tr>
                <td class="border px-2">{{ $today->title }}</td>
                <td class="border px-2">{{ $today->prioritas }}</td>
              </tr>
              @endforeach
            
              @if($cekak == 0)
              <tr class="text-center">
                <td colspan="2" class="px-2">
                  <i class="fas fa-info-circle"></i>
                  <i>Tidak Ada Aktivitas Untuk Hari Ini</i>
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-body col-xl-6 px-0 pl-xl-3 py-0 mt-xl-0 mt-4">
        <div class="card">
            <a href="#DaftarRequest" class="d-block card-header m-0 px-sm-3 px-2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="DaftarRequest">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Request</h6>
            </a>
          <div class="collapse hide" id="DaftarRequest">
            <div class="card-body px-sm-3 px-2">
              <div class="row">
                @if($cekrequest == 0)
                  <div class="col">
                    <div class="card border-danger mb-2">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="text-center">
                              <i class="fas fa-info-circle"></i>
                              <i>Belum Ada Request</i>
                            </div>
                          </div>                      
                        </div>
                      </div>
                    </div>
                  </div>
                @endif

                @if($cekrequest > 0)
                <div class="col-12" style="overflow-y: auto; max-height: 500px;">
                  <table class="table table-bordered border" id="tableriwayat" cellspacing="0">
                    <thead>
                      <tr class="bg-primary text-light">
                        <th class="border px-2">Request</th>
                        <th class="border px-2">Tanggal Estimasi</th>
                        <th class="border px-2">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($listrequest as $list)
                      <?php 
                        $tanggal2 = $list->ar_tanggal_estimasi;
                        $tanggal = substr($list->ar_tanggal_estimasi,-0,10);
                        $tanggal_request = date('d M, Y',strtotime($tanggal));
                        ?>
                      <tr>
                        <td class="border px-2">{{ $list->ar_request }}</td>
                        <td class="border px-2">{{ $tanggal_request }}</td>
                        <td class="border px-2"> 
                          <a class="btn-sm btn-info btn-circle" href="{{ route('app_request.show',$list->id) }}"  data-toggle="tooltip" data-placement="left" title="Info">
                          <i class="fas fa-eye"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>




<hr>
<div class="col-12 px-sm-3 px-2">
        <h6 class="font-weight-bold text-primary mb-2">Riwayat Pemakaian Kendaraan</h6>
        <div class="col-12 px-0" >
          <table class="table table-bordered border" id="table_kendaraan" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-light">
              <th class="border px-2">Kendaraan</th>
              <th class="border px-2">Pengguna</th>
              <th class="border px-2">Tanggal Mulai</th>
              <th class="border px-2">Jam Mulai</th>
              <th class="border px-2">Lokasi Tujuan</th>
              <th class="border px-2">Tujuan Pemakaian</th>
              <th class="border px-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kendaraan as $item)
            <?php 
              $tanggal1 = $item->ak_tanggal_mulai;
              $tanggal = substr($tanggal1,-0,10);
              $tanggal_mulai = date('d M, Y',strtotime($tanggal1));

              $jam_mulai = substr($item->ak_jam,-0,5);
              $jam_selesai = substr($item->ak_jam_selesai,-0,5);
            ?>
            <tr>
              <input type="hidden" class="delete_id" value="{{ $item->id }}">
              <td class="border px-2">{{ $item->ak_mk_id }}</td>
              <td class="border px-2">{{ $item->ak_pengguna }}</td>
              <td class="border px-2">{{ $tanggal_mulai }}</td>
              <td class="border px-2">{{ $jam_mulai }}</td>
              <td class="border px-2">{{ $item->ak_lokasi_tujuan }}</td>
              <td class="border px-2">{{ $item->ak_tujuan_pemakaian }}</td>
              <td class="border px-2">
                <a class="btn btn-info btn-circle btn-sm mb-2" href="{{ route('app_kendaraan.show',$item->id) }}"  data-toggle="tooltip" data-placement="left" title="show"> 
                  <i class="fas fa-eye"></i>
                </a>
              
                <form action="{{ route('app_kendaraan.destroy',$item->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndeleteitem" type="submit" value="Delete"> --}}
                  <a href="" class="btn btn-danger btn-circle btn-sm  btndeleteitem mb-2"  data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
            
              @if($cekken == 0)
              <tr class="text-center">
                <td colspan="8" class="px-2 text-center">
                  <i class="fas fa-info-circle"></i>
                  <i>Belum Ada Riwayat Pemakaian Kendaraan</i>
                </td>
              </tr>
              @endif
            </tbody>
          </table>

</div>
</div>
@endif

@if(auth()->user()->level == "pegawai")
<div class="row justify-content-center">
  <div class="card col-lg-10 px-0 mb-4 py-0" data-aos="fade-up" data-aos-delay="50">
    <div class="card-header py-3 px-3">
      <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Buat Request</h6>
    </div>
    <div class="card-body px-3">
      <div class="row">
        <div class="col-lg-5 border-dark">
          <form action="{{ route('app_request.store') }}" method="POST" enctype="multipart/form-data" class="">
            @csrf
            <label for="ar_request" class="form-label" data-aos="fade-right" data-aos-delay="150">Request</label>
            <input type="text" class="mb-2 form-control @error('request') is-invalid @enderror" name="ar_request" 
            required data-aos="fade-right" data-aos-delay="200" value="{{ old('ar_request') }}">
            @error('request')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="mb-3 mb-sm-2">
              <label for="ar_kebutuhan" class="form-label" data-aos="fade-right" data-aos-delay="200">Tingkat Kebutuhan</label>
              <select name="ar_kebutuhan" required class="form-control @error('ar_kebutuhan') is-invalid @enderror" required data-aos="fade-right" data-aos-delay="250">
                <option value="">Pilih Tingkat Kebutuhan</option>
                <option value="rendah">Rendah</option>
                <option value="sedang">Sedang</option>
                <option value="tinggi">Tinggi</option>
              </select>
              @error('ar_kebutuhan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <input type="hidden" class="mb-2 form-control" name="ar_perequest" value="{{ auth()->user()->name }}" >
            </div>
            <div class="mb-3 mb-sm-2">
            <label for="tanggal_estimasi" class="form-label" data-aos="fade-right" data-aos-delay="250">Tanggal Estimasi</label>
            <input type="date" class="mb-2 form-control @error('tanggal_estimasi') is-invalid @enderror" name="tanggal_estimasi" 
            required data-aos="fade-right" data-aos-delay="300" value="{{ old('tanggal_estimasi') }}">
            @error('tanggal_estimasi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror 
            </div>
            <div class="mb-3 mb-sm-2">
            <label for="ar_catatan" class="form-label" data-aos="fade-right" data-aos-delay="300">Catatan</label>
            <textarea type="text" class="form-control @error('catatan') is-invalid @enderror" name="ar_catatan" required
              rows="4" data-aos="fade-right" data-aos-delay="350"></textarea>
            @error('catatan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <button type="submit" class="btn btn-success mt-4 mb-4">
              Kirim Request
              <i class="fa fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <div class="card-body col-lg-7 pl-lg-3 py-0 px-sm-3 px-3">
          <div class="card" data-aos="fade-left" data-aos-delay="150">
            <div class="card-header py-3 px-sm-3 px-2">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Request</h6>
            </div>
            <div class="card-body px-sm-3 px-2">
              <div class="row">
                @if($cek == 0)
                  <div class="col">
                    <div class="card border-danger mb-2">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="text-center">
                              <i class="fas fa-info-circle"></i>
                              <i>Tidak Ada Riwayat Request</i>
                            </div>
                          </div>                      
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
  
                @if($cek > 0)
                <div class="col-12" style="overflow-y: auto; max-height: 285px;">
                  <table class="table table-bordered border" id="table" cellspacing="0">
                    <thead>
                      <tr class="bg-primary text-light">
                        <th class="col-6 border px-2">Request</th>
                        <th class="col-5 border px-2">Tanggal</th>
                        <th class="col-1 border px-2">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($request as $req)
                      <?php 
                        $tanggal1 = $req->created_at;
                        $tanggal = substr($tanggal1,-0,10);
                        $tanggal_req2 = date('d M, Y',strtotime($tanggal1));
                        ?>
                      <tr>
                        <td class="border px-2">{{ $req->ar_request }}</td>
                        <td class="border px-2">{{ $tanggal_req2 }}</td>
                        <td class="border px-2"> 
                          <a class="btn-sm btn-info btn-circle" href="{{ route('app_request.show',$req->id) }}"  data-toggle="tooltip" data-placement="left" title="Info">
                          <i class="fas fa-info-circle"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @endif
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
