
<!DOCTYPE html>
<html lang="en">
<head>
  <title>General Affair</title>
  @include('template.head')
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    @if(auth()->user()->level == "general-affair")
    @include('template.sidebar')
    @endif

    @if(auth()->user()->level == "management")
    @include('template.sidebar')
    @endif
    <!-- End of Sidebar -->

    {{-- sweet alert --}}
    @include('sweetalert::alert')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        @include('template.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid px-sm-2 px-0">
            <!-- Page Heading -->
            @yield('content')
        </div>

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      @include('template.footer')
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top" style="z-index: 100">
    <i class="fas fa-angle-up" style="z-index: 100"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Anda akan keluar dari halaman ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="login.html" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out"></i>
            Ya
          </a>
        </div>
      </div>
    </div>
  </div>
  @include('template.script')
</body>

</html>

