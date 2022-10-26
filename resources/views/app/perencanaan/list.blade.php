@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Aktivitas</h6>
      <button class="btn btn-primary mt-3">
        <i class="fa fa-plus"></i>
        <a href="{{ url('downloadlist') }}" class="text-white text-decoration-none">Unduh</a>
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <?php 
        use App\Models\Aktivitas;
        $listaktivitas = Aktivitas::all();


       ?>        
       <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Aktivitas</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($listaktivitas as $list)
            <tr>
              <td>{{ $list->title }}</td>
              <td>{{ $list->start_date }}</td>
              <td>{{ $list->status }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

