<!DOCTYPE html>
<html lang="en">
@include('template-landing.head')

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo">
        <a href="">General Affair<span>.</span></a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      {{-- <a href="index.html" class="logo">
        <img class="template/img-profile" src="{{asset('template/img/icon.png') }}" width="35px">
      </a> --}}
      <img src="assets/img/logo.png" alt="">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->
  <!-- ===== Hero Image ===== -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>General Affair</span></h1>
      <h2>Berfokus pada pemberian pelayanan kepada seluruh bagian perusahaan demi kelancaran kerja perusahaan secara menyeluruh melalui supporting unit.</h2>
    </div>
  </section>
  
  <main id="main">
    <!-- ======= Featured Services Section ======= -->    
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title">
                <a class="" data-bs-toggle="modal" href="#modal-1">Pemeliharaan dan Perawatan</a>
              </h4>
              <p class="description">Pemeliharaan dan Perawatan tentang kondisi dan fasilitas perusahaan.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-task"></i></div>
              <h4 class="title">
                <a data-bs-toggle="modal" href="#modal-2">Menyiapkan Laporan Bersekala</a>
              </h4>
              <p class="description">Menyiapkan laporan berkala untuk keperluan rapat anggaran.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-check"></i></div>
              <h4 class="title">
                <a data-bs-toggle="modal" href="#modal-3">Membantu Perizinan</a>
              </h4>
              <p class="description">Divisi GA pada sebuah perusahaan juga bisa membantu dalam pengurusan segala bentuk perizinan yang dibutuhkan.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-group"></i></div>
              <h4 class="title">
                <a data-bs-toggle="modal" href="#modal-4">Membina Hubungan Baik</a>
              </h4>
              <p class="description">Membina hubungan baik dengan para suplier barang atau jasa.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Featured Services Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About</h2>
          <h3>Find Out More <span>About Us</span></h3>
          <p>General Affair atau GA biasanya bertanggung jawab mengurus berbagai hal yang berhubungan dengan kegiatan operasional perusahaan.</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos-delay="100">
            <ul>
              <li data-aos="fade-right">
                <i class="bx bx-briefcase"></i>
                <div>
                  <h5>Bertanggung Jawab Pada Pengadaan Barang</h5>
                  <p>mengurus pengadaan barang. Misalnya, barang atau aset mengalami kerusakan atau sudah lama dan mengalami penurunan kinerja. Dalam hal ini, GA akan memastikan barang atau aset perusahaan mana saja yang sudah harus diperbarui.</p>
                </div>
              </li>
              <li data-aos="fade-left">
                <i class="bx bx-money"></i>
                <div>
                  <h5>Bertanggung Jawab Pada Pembayaran dan Pembelian Rutin</h5>
                  <p>Selain membeli aset perusahaan yang bersifat semi permanen, GA juga bertugas melakukan pembelian rutin perusahaan.</p>
                </div>
              </li>
              <li data-aos="fade-right">
                <i class="bx bx-bar-chart"></i>
                <div>
                  <h5>General Affair Bertugas untuk Pemeliharaan Aset.</h5>
                  <p>GA bertanggung jawab untuk mengontrol dan memelihara aset yang ada di perusahaan.</p>
                </div>
              </li>
              <li data-aos="fade-left">
                <i class="bx bx-building"></i>
                <div>
                  <h5>Renovasi dan Pembukaan Kantor Cabang.</h5>
                  <p>GA bertugas untuk merinci biaya yang dibutuhkan untuk keperluan renovasi atau pembukaan kantor cabang.</p>
                </div>
              </li>
            </ul>
            <div class="text-center">
              <p>
                Cakupan kerja GA sangat luas. Ia mengurusi seluruh prasarana yang berkaitan dengan kelangsungan perusahaan. 
                <br> Mulai dari alat alat kerja, perawatan bangunan, tempat makan, dan banyak lagi.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
          <p>Pertanyaan Seputar General Affair</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <ul class="faq-list">
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apa Itu General affair (GA)? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    General affair adalah jabatan atau divisi yang berada dibawah naungan kepala operasional atau kepala divisi umum.
                  </p>
                </div>
              </li>
              <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apa Tugas General Affair? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    General Affair Bertanggung Jawab Pada Pembayaran dan Pembelian Rutin. Selain membeli aset perusahaan yang bersifat semi permanen, GA juga bertugas melakukan pembelian rutin perusahaan. 
                  </p>
                </div>
              </li>
              <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Apakah disetiap perusahaan memiliki General Affair? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Ya Karena keberadaan General Affair di perusahaan sangat membantu dalam mengawasi dan mengurus fasilitas kantor, agar karyawan bisa bekerja dengan fasilitas yang maksimal.
                  </p>
                </div>
              </li>
              <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Skill apa saja yang harus dimiliki General Affair? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Beberapa Skill yang dimiliki General Affair Yaitu Ketelitian, Kejujuran, Pandai Bernegoisasi, Interpersonal, Problem Solving,
                    Kemampuan Mengkoordinir, Pencatatan dan Pembukuan
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active">
    <i class="bi bi-arrow-up-short"></i>
  </a>
  @include('template-landing.main')
  @include('template-landing.footer')
  @include('template-landing.script')
</body>

</html>