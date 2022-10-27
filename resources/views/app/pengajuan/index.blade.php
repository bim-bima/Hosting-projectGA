@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

<div class="mb-4" data-aos="fade-up" data-aos-delay="50">
  @if(auth()->user()->level == "management")
  @foreach ($ajuan as $pengajuan)
  <div class="card mb-4">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="150">Persetujuan</h6>
    </div>
    <form action="{{ route('app_pengajuan.update',$pengajuan->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="d-flex row mb-4">
              <div for="ap_nama_pengajuan" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Nama Pengajuan</div>
              <div class="card-text col-sm-5 col-md-8 col-lg-6 col-xl-5 col-12 pl-sm-0">{{ $pengajuan->ap_nama_pengajuan }}</div>
            </div>
            <div class="d-flex row mb-4">
              <div for="ap_mjp_id" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Jenis Pengajuan</div>
              <div class="card-text col-sm-5 col-md-6 col-lg-6 col-xl-5 col-12 pl-sm-0">{{ $pengajuan->ap_mjp_id }}</div>
            </div>
            <div class="d-flex row mb-4">
              <div for="ap_mv_id" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Vendor</div>
              <div class="card-text col-sm-5 col-md-6 col-lg-6 col-xl-5 col-12 pl-sm-0">{{ $pengajuan->ap_mv_id }}</div>
            </div>
            <?php 
            $harga1 = $pengajuan->ap_biaya;
            $biaya = number_format($harga1,0,",",",");

            $tanggal1 = $pengajuan->ap_tanggal_pengadaan;
            $tanggal = substr($tanggal1,-0,10);
            $tanggal_estimasi = date('d M, Y',strtotime($tanggal1));
                
            ?>
            <div class="d-flex row mb-4">
              <div for="ap_biaya" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Biaya</div>
              <div class="card-text col-sm-5 col-md-6 col-lg-6 col-xl-5 col-12 pl-sm-0">Rp.{{ $biaya }}</div>
            </div>
            <div class="d-flex row mb-4">
              <div for="ap_catatan" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Catatan</div>
              <div class="card-text col-sm-8 col-md-8 col-lg-7 col-xl-8 col-12 pl-sm-0">{{ $pengajuan->ap_catatan }}</div>
            </div>
            <div class="d-flex row mb-4">
              <div for="ap_tanggal_pengadaan" class="form-label text-primary col-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 font-weight-bold pr-0">Tanggal Estimasi</div>
              <div class="card-text col-sm-5 col-md-6 col-lg-6 col-xl-5 col-12 pl-sm-0 text-danger">{{ $tanggal_estimasi }}</div>
            </div>
          </div>
          <div class="col-lg-6 pl-xl-4" data-aos="fade-left" data-aos-delay="200">
            <div class="mb-3">
              <label for="ap_reason" class="form-label">Catatan</label>
              <textarea type="text" class="form-control @error('reason') is-invalid @enderror" name="ap_reason" required rows="5"></textarea>
              @error('catatan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <fieldset class="d-flex row">
              <legend class="col-form-label col-12 col-sm-6 col-md-5 col-lg-6 col-xl-5 text-primary font-weight-bold float-sm-left pt-0">Setujui Pengajuan ?</legend>
              <div class="col-sm-4 col-lg-5 col-xl-4 col-12 pl-sm-0">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ap_status" id="gridRadios1" value="setujui" checked>
                  <label class="form-check-label p-sm-0" for="gridRadios1">
                    Setujui 
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ap_status" id="gridRadios2" value="tidak setuju">
                  <label class="form-check-label p-sm-0" for="gridRadios2">
                    Tidak Setujui
                  </label>
                </div>
              </div>
            </fieldset>
            <button type="submit" class="btn btn-primary mt-2">
              Kirim
              <i class="fa fa-paper-plane"></i>
            </button>
          </div>
        </div>          
      </div>
    </form>
  </div>
  @endforeach     
  @endif

  @if(auth()->user()->level == "general-affair")
  <div class="card">
    <div class="card-header py-3 px-sm-3 px-2">
      <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Buat Pengajuan</h6>
    </div>
    <div class="card-body px-sm-3 px-2">
      <form action="{{ route('app_pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-md-6 mb-sm-2 mb-3" data-aos="fade-right" data-aos-delay="150">
          <label for="nama_pengajuan" class="form-label">Nama Pengajuan</label>
          <input type="text" class="form-control @error('nama_pengajuan') is-invalid @enderror" name="nama_pengajuan" required autofocus value="{{ old('nama_pengajuan') }}">
          @error('nama_pengajuan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6 mb-sm-2 mb-3" data-aos="fade-left" data-aos-delay="150">
          <label for="jenis_pengajuan" class="form-label">Jenis Pengajuan</label>
          <select name="jenis_pengajuan" required class="form-control @error('jenis_pengajuan') is-invalid @enderror" required>
            <option value="">Pilih Jenis Pengajuan</option>
            @foreach ($jenispengajuan as $jenis)
            @if( old('jenis_pengajuan') == $jenis->mjp_jenis  )
            <option value="{{ $jenis->mjp_jenis }}" selected>{{ $jenis->mjp_jenis}}</option>
            @else
            <option value="{{ $jenis->mjp_jenis }}">{{ $jenis->mjp_jenis}}</option>
            @endif
            @endforeach    
          </select>
          @error('jenis_pengajuan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6 mb-2"data-aos="fade-right" data-aos-delay="200">  
          <div class="form-group">  
              <label for="vendor">Vendor</label>
              <input type="text" id="vendor" name="vendor" list="list_vendor" class="form-control" placeholder="Pilih Vendor">
             <datalist id="list_vendor" class="select2">
             @foreach ($vendor as $ven)
            @if( old('vendor') == $ven->mv_nama_vendor )
            <option value="{{ $ven->mv_nama_vendor }}" selected>{{ $ven->mv_nama_vendor}}</option>
            @else
            <option value="{{ $ven->mv_nama_vendor }}">{{ $ven->mv_nama_vendor}}</option>
            @endif
            @endforeach  
            </datalist> 
          </div>  
      </div>

    <script>
      $(document).ready(function() {
        $('.select2').select2();
      });
    </script>

        <!-- <div class="col-md-6 mb-2" data-aos="fade-right" data-aos-delay="200">
          <label for="vendor" class="form-label">Vendor</label>
          <select name="vendor" class="form-control @error('vendor') is-invalid @enderror" required>
            <option value="">Pilih Vendor</option>
            @foreach ($vendor as $ven)
            @if( old('vendor') == $ven->mv_nama_vendor )
            <option value="{{ $ven->mv_nama_vendor }}" selected>{{ $ven->mv_nama_vendor}}</option>
            @else
            <option value="{{ $ven->mv_nama_vendor }}">{{ $ven->mv_nama_vendor}}</option>
            @endif
            @endforeach    
          </select>
          @error('vendor')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div> -->
        <div class="col-md-6 mb-2" data-aos="fade-left" data-aos-delay="200">
          <label for="biaya" min="1" class="form-label">Biaya (Rp)</label>
          <input type="number" class="form-control @error('biaya') is-invalid @enderror" name="biaya" required autofocus value="{{ old('biaya') }}">
          @error('biaya')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6 mb-sm-2 mb-3" data-aos="fade-right" data-aos-delay="250">
          <label for="catatan" class="form-label">Catatan</label>
          <textarea type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" required rows="3" ></textarea>
          @error('catatan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6 mb-sm-2 mb-3" data-aos="fade-left" data-aos-delay="250">
          <label for="tanggal_pengadaan" class="form-label">Tanggal Estimasi</label>
          <input type="date" class="form-control @error('tanggal_pengadaan') is-invalid @enderror" name="tanggal_pengadaan" required autofocus value="{{ old('tanggal_pengadaan') }}" >
          @error('tanggal_pengadaan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success mt-3 mb-1">
            Kirim Pengajuan
            <i class="fa fa-paper-plane"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
  @endif
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pengajuan</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="table-responsive">
    @if($cek == 0)
    <div class="col px-0">
      <div class="card mb-3 border-danger">
        <div class="card-body">
          <div class="row">
            <div class="col-12 px-1">
              <div class="text-center">
                <i class="fas fa-info-circle"></i>
                <i>Belum Ada Riwayat Pengajuan Disini</i>
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
            <th class="border col-1 col-sm-3">Tanggal</th>
            <th class="border col-2 col-sm-5">Nama Pengajuan</th>
            <th class="border col-2 col-sm-3">Status</th>
            <th class="border col-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datapengajuan as $pengajuan)
          <tr>
            <?php 
              $tanggal1 = $pengajuan->created_at;
              $tanggal = substr($tanggal1,-0,10);
              $tanggal_pengajuan = date('d M, Y',strtotime($tanggal1));

              // $tanggal2 = $request->ar_tanggal_estimasi;
              //   $tanggal = substr($tanggal2,-0,10);
              //   $tanggal_estimasi = date('d M, Y',strtotime($tanggal2));
            ?>
            <input type="hidden" class="delete_id" value="{{ $pengajuan->id }}">
            <td class="border">{{ $tanggal_pengajuan }}</td>
            <td class="border">{{ $pengajuan->ap_nama_pengajuan }}</td>
            <td class="border">{{ $pengajuan->ap_status }}</td>
            <td class="border">
              <a class="btn-sm btn-info btn-circle mb-xl-0 mb-2" href="{{ route('app_pengajuan.show',$pengajuan->id) }}"  data-toggle="tooltip" data-placement="left" title="Info">
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
    </div>
  </div>
</div>
@endsection

