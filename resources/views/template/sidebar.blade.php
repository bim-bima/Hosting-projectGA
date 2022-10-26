<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <img class="template/img-profile" src="{{asset('template/img/icon.png') }}" width="35px">
    <div class="sidebar-brand-text">General Affair</div>
  </a>
      

    <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item ">
    <a class="nav-link" href="/home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
      App
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApp"
      aria-expanded="true" aria-controls="collapseApp">
      <i class="fa fa-desktop"></i>
      @if(auth()->user()->level == "general-affair")
      <span>App</span>
      @endif
      @if(auth()->user()->level == "management")
      <span>GA System</span>
      @endif
    </a>
    <div id="collapseApp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="z-index: 100">
      <div class="text-white bg-primary py-2 rounded">
        <a class="nav-link" href="app_perencanaan" aria-labelledby="headingTwo">
          <i class="fa fa-calendar"></i>
          <span>Perencanaan Aktivitas</span>
        </a>
        <a class="nav-link" href="app_asset">
          <i class="fa fa-leaf"></i>
          <span>Asset</span>
        </a>
        <a class="nav-link nav-item active" href="app_kendaraan">
          <i class="fa fa-car"></i>
          <span>Kendaraan</span>
        </a>
        <a class="nav-link nav-item active" href="app_pengajuan">
          <i class="fa fa-leaf"></i>
          <span>Pengajuan Pengadaan</span>
        </a>
        <a class="nav-link nav-item active" href="app_request">
          <i class="fa fa-leaf"></i>
          <span>Request</span>
        </a>

      </div>
    </div>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(auth()->user()->level == "general-affair")
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDataMaster" aria-expanded="true"
        aria-controls="collapseDataMaster">
        <i class="fas fa-fw fa-key"></i>
        <span>Data Master</span>
      </a>
      <div id="collapseDataMaster" class="collapse" aria-labelledby="headingPages"
        data-parent="#accordionSidebar" style="z-index: 100">
        <ul class="text-white bg-primary p-0 rounded">
          <a class="nav-link" href="master_pic" aria-expanded="true">
            <i class="fa fa-user"></i>
            <span>PIC</span>
          </a>
          <a class="nav-link" href="master_kendaraan" >
            <i href="master_kendaraan" class="fa fa-car"></i>
            <span>Kendaraan</span>
          </a>
          <a class="nav-link" href="master_aktivitas">
            <i class="fa fa-tasks"></i>
            <span>Aktivitas</span>
          </a>
          <a class="nav-link" href="master_vendor">
            <i class="fa fa-shopping-cart"></i>
            <span>Vendor</span>
          </a>
          <a class="nav-link" href="master_barang">
            <i class="fa fa-wrench"></i>
            <span>Barang</span>
          </a>
          <a class="nav-link" href="master_jenisbarang">
            <i class="fa fa-filter"></i>
            <span>Jenis Barang</span>
          </a>
          <a class="nav-link" href="master_statusfollowup">
            <i class="fa fa-table"></i>
            <span>Status Follow Up</span>
          </a>
          <a class="nav-link" href="master_lokasiasset">
            <i class="fa fa-map-marker"></i>
            <span>Lokasi Asset</span>
          </a>
        </ul>
      </div>
    </li>
    <hr class="sidebar-divider d-md-block">
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
