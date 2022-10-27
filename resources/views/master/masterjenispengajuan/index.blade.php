@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Jenis jenis Pengajuan</h6>
    <button class="btn btn-primary mt-2">
      <i class="fa fa-plus"></i>
      <a href="{{ route('master_jenispengajuan.create') }}" class="text-white text-decoration-none">Tambah</a>
    </button>
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
                  <i>Belum Ada Data Jenis Pengajuan Disini</i>
                </div>
              </div>                      
            </div>
          </div>
        </div>
      </div>
      @endif

      @if($cek > 0)
      <div class="table-responsive col-xl-7 border-dark">
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
          <thead>
            <tr class="bg-primary text-light">
              <th class="border col-4 col-sm-7 col-md-9">Jenis Pengajuan</th>
              <th class="border col-4 col-sm-2">Aksi</th>
            </tr>
          </thead>
          <tbody class="border-top-0">
            @foreach ($jenispengajuan as $jenis)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $jenis->id }}">
              <td class="border">{{ $jenis->mjp_jenis }}</td>
              <td class="border">
                <a class="btn-sm btn-warning btn-circle mb-sm-0 mb-1" href="{{ route('master_jenispengajuan.edit',$jenis->id) }}"  data-toggle="tooltip" data-placement="left" title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ route('master_jenispengajuan.destroy',$jenis->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete2" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-sm-0 mb-1 btndeletejenis" data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- {{ $jenispengajuan->links() }} --}}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

