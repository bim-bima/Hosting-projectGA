<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow px-1">
  <!-- Sidebar Toggle (Topbar) -->
  @if(auth()->user()->level == "general-affair")
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle">
    <i class="fa fa-bars"></i>
  </button>
  @endif
  @if(auth()->user()->level == "management")
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle">
    <i class="fa fa-bars"></i>
  </button>
  @endif
  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Nav Item - Alerts -->
      <?php 
      use App\Models\Pengajuan;
      use App\Models\AppRequest;
      
      $pesan = AppRequest::all();
      $jumlahpesan = AppRequest::count();
      
      $pengajuan = Pengajuan::where('ap_status', 'menunggu persetujuan')->get();
      $jumlah = Pengajuan::where('ap_status', 'menunggu persetujuan')->count();
      ?>
    @if(auth()->user()->level == "management")
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if($jumlah > 0)
          <span class="badge badge-danger badge-counter">{{ $jumlah }}</span>
        @endif
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Pemberitahuan Pengajuan
        </h6>
        @foreach( $pengajuan as $list)
        <a class="dropdown-item d-flex align-items-center" href="{{ route('app_pengajuan.show',$list->id) }}">
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
            <?php  
            $tanggal1 = $list->created_at;
            $tanggal = substr($tanggal1,-0,10);
            $tanggal_pengajuan = date('d M, Y',strtotime($tanggal1));

            ?>
            <div class="small text-red-500">{{ $tanggal_pengajuan }}</div>
              {{ $list->ap_nama_pengajuan }}
          </div>
        </a>
        @endforeach
        @if($jumlah == 0)
        <p class="dropdown-item text-center small text-grey-500"><i>Tidak Ada Pengajuan</i></p>
        @endif

        @if($jumlah > 0)
        <a class="dropdown-item text-center small text-grey-500" href="/app_pengajuan"><i>Total Pengajuan : {{ $jumlah }} </i></a>
        @endif
          
      </div>  
    </li>
    @endif

    @if(auth()->user()->level == "general-affair")
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        @if($jumlahpesan > 0)
        <span class="badge badge-danger badge-counter">{{ $jumlahpesan }}</span>
        @endif
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
          Pesan Request
        </h6>
        @foreach( $pesan as $item)
        <a class="dropdown-item d-flex align-items-center" href="{{ route('app_request.show',$item->id) }}" >
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
          <?php  
          $tanggal1 = $item->created_at;
          $tanggal = substr($tanggal1,-0,10);
          $tanggal_req = date('d M, Y',strtotime($tanggal1));

          // $tanggal2 = $request->ar_tanggal_estimasi;
          //       $tanggal = substr($tanggal2,-0,10);
          //       $tanggal_estimasi = date('d M, Y',strtotime($tanggal2));
          ?>
            <div class="small text-red-500">{{ $tanggal_req }}</div>
              {{ $item->ar_request }}
          </div>
        </a>
        @endforeach

        @if($jumlahpesan == 0)
        <p class="dropdown-item text-center small text-gray-500"><i>Tidak Ada Pesan</i></p>
        @endif

        @if($jumlahpesan > 0)
        <a class="dropdown-item text-center small text-gray-500" href="/app_request"><i>Total Pesan : {{ $jumlahpesan }} </i></a>
        @endif
      </div>
    </li>
    @endif
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-3 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
        <img class="template/img-profile rounded-circle" src="{{asset('template/img/undraw_profile.svg') }}" width="50px">
      </a>
        <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="z-index: 100">

        <a class="dropdown-item" href="{{ route('edit_profile') }}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ __('Ubah Profile') }}
        </a>

        <a class="dropdown-item" href="{{ route('edit_password') }}">
        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ __('Ubah Password') }}
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" 
        data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>

{{-- onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" --}}
<!-- onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"  -->