@extends('layouts.main')
@section('content')
@include('sweetalert::alert')

@if(auth()->user()->level == "general-affair")
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="50">
  <div class="card-header px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="100">Daftar Request</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <div class="row justify-content-center">
      @if($cek == 0)
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

      @if($cek > 0)
      <div class="table-responsive col-md-12 border-dark">
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
          <thead class="">
            <tr class="bg-primary text-light">
              <th class="border px-2 col-lg-2">Tanggal</th>
              <th class="border px-2 col-lg-2">Perequest</th>
              <th class="border px-2 col-lg-2">Request</th>
              <th class="border px-2 col-lg-2">Catatan</th>
              <th class="border px-2 col-lg-2">Tingkat Kebutuhan</th>
              <th class="border px-2 col-lg-2">Tanggal Estimasi</th>
              <th class="border px-2 col-lg-1">Aksi</th>
            </tr>
          </thead>
          <tbody class="border-top-0">
            @foreach ($datarequest as $request)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $request->id }}">
              <?php 
                $tanggal1 = $request->created_at;
                $tanggal = substr($tanggal1,-0,10);
                $tanggal_req = date('d M, Y',strtotime($tanggal1));

                $tanggal2 = $request->ar_tanggal_estimasi;
                $tanggal = substr($tanggal2,-0,10);
                $tanggal_estimasi = date('d M, Y',strtotime($tanggal2));
               ?>
              <td class="border px-2">{{ $tanggal_req }}</td>
              <td class="border px-2">{{ $request->ar_perequest }}</td>
              <td class="border px-2">{{ $request->ar_request }}</td>
              <td class="border px-2">{{ $request->ar_catatan }}</td>
              <td class="border px-2">{{ $request->ar_kebutuhan }}</td>
              <td class="border px-2">{{ $tanggal_estimasi }}</td>
              <td class="border px-2">
                <form action="{{ route('app_request.destroy',$request->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete2" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-sm-0 mb-2 btndeleterequest">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- {{ $datarequest->links() }} --}}
      </div>
      @endif
    </div>
  </div>
</div>
@endif

@if(auth()->user()->level == "pegawai")
<div class="row px-sm-3 px-0">
  <div class="card shadow mb-4 col-12 px-0">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Request</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6 border-dark">
          <form action="{{ route('app_request.store') }}" method="POST" enctype="multipart/form-data" class="">
            @csrf
            <label for="ar_request" class="form-label">Request</label>
            <input type="text" class="mb-2 form-control @error('request') is-invalid @enderror" name="ar_request" required>
            @error('request')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
      
            <label for="ar_catatan" class="form-label">Catatan</label>
            <textarea type="text" class="form-control @error('catatan') is-invalid @enderror" name="ar_catatan" required rows="4"></textarea>
            @error('catatan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if(auth()->user()->level == "pegawai")
            <button class="btn btn-info mt-4 mr-1 mb-1">
              <i class="fa fa-angle-left"></i>
              <a href="/home" class="text-white text-decoration-none">Kembali</a>
            </button>
            @endif
            <button type="submit" class="btn btn-success mt-4 mb-1">
              Kirim Request
              <i class="fa fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>
     </div>
  </div>
</div>
@endif
@endsection

