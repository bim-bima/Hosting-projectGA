@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Status FollowUp</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ route('master_statusfollowup.create') }}" class="text-white text-decoration-none">Tambah</a>
      </button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="table-responsive col-md-8">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="col-sm-5 col-3">Nama Status FollowUp</th>
                <th class="col-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datastatusfollowup as $statusfollowup)
              <tr>
                <input type="hidden" class="delete_id" value="{{ $statusfollowup->id }}">
                <td>{{ $statusfollowup->msf_status }}</td>
                <td>
                  <a class="btn btn-warning btn-circle mb-sm-0 mb-2" href="{{ route('master_statusfollowup.edit',$statusfollowup->id) }}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('master_statusfollowup.destroy',$statusfollowup->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      {{-- <input class="btn btn-danger btndelete7" type="submit" value="Delete"> --}}
                      <a href="" class="btn btn-danger btn-circle mb-sm-0 mb-2 btndelete7">
                        <i class="fas fa-trash"></i>
                      </a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $datastatusfollowup->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

