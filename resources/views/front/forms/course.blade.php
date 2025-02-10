@extends('layouts.master')
@section('title', 'Pusba - Kursus Bahasa Asing')
@section('content')


<header id="header">
  <div class="container">

    <div class="logo float-left">
      <a href="{{route('front.index')}}"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>
    </div>
    <x-nav-pusba/>
  </div>
</header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/prediction.jpg') }}');">
                        <div class="carousel-container">
                            <div class="carousel-content text-center">
                                <!-- Optional heading atau subjudul di sini -->
                                <h2>Form Pendaftaran <span>Kursus Bahasa Asing</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Contact Us Section (Form) ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Formulir Pendaftaran Kursus Bahasa Asing</h2>
            </div>

            <div class="row">

                <div class="col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>
                            Yayasan Pendidikan Bhakti Pos Indonesia (​YPBPI)
                            Jalan Sariasih No. 54 Sarijadi Bandung, 40151, Jawa Barat Indonesia
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>pusba@ulbi.ac.id</p>
                    </div>
                </div>

                <div class="col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>0812-2261-1176</p>
                    </div>
                </div>

                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('front.forms.submit', ['category' => $category->slug]) }}" method="POST" role="form">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Jenis Test -->
                                <div class="form-group">
                                    <label for="course_category_id">Kategori Kursus</label>
                                    <select class="form-control" name="course_category_id" required>
                                        <option value="">Pilih Kategori Kursus...</option>
                                        @foreach($courseCategories as $courseCat)
                                            <option value="{{ $courseCat->id }}">{{ $courseCat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Pilih Jadwal -->
                                <div class="form-group">
                                    <label for="study_program_id">Program Studi</label>
                                    <select class="form-control" name="study_program_id" required>
                                        <option value="">Pilih Program Studi...</option>
                                        @foreach($studyPrograms as $studyProgram)
                                            <option value="{{ $studyProgram->id }}">{{ $studyProgram->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                        <div class="text-lg-center">
                            <button type="submit" class="btn btn-warning btn-lg text-white">
                                <i class="fas fa-paper-plane"></i> Submit
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Us Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">
    
              <!-- Kolom 1: Informasi Footer -->
              <div class="col-lg-4 col-md-6 footer-info">
                <img src="{{asset('assets/img/logo.png')}}" alt="ULBI Logo" style="max-width: 150px;">
                <p style="margin-top: 10px;">
                  ULBI adalah institusi pendidikan tinggi yang didirikan oleh Yayasan Pendidikan Bhakti Pos Indonesia (YPBPI). 
                  ULBI memiliki visi menjadi perguruan tinggi vokasi yang unggul secara Nasional dalam bidang Logistik dan Manajemen Rantai Pasok.
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="social-icon"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="social-icon"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="social-icon"><i class="bx bxl-youtube"></i></a>
                  <a href="#" class="social-icon"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="social-icon"><i class="bx bxl-tiktok"></i></a>
                </div>
              </div>
    
              <!-- Kolom 2: Tautan Bermanfaat -->
              <div class="col-lg-4 col-md-6 footer-links">
                <h4>Lokasi</h4>
                <p>Yayasan Pendidikan Bhakti Pos Indonesia (YPBPI)</p>
                <p>Jalan Sariasih No. 54 Sarijadi Bandung, 40151, Jawa Barat Indonesia</p>
                <h4>Kontak</h4>
                <ul>
                  <li>➝ <a href="#">Sekretariat</a></li>
                  <li>➝ <a href="#">HUMAS</a></li>
                  <li>➝ <a href="#">Admission</a></li>
                </ul>
                <h4>Email</h4>
                <ul>
                  <li>➝ <a href="#">info@ulbi.ac.id</a></li>
                  <li>➝ <a href="#"></a>humas@ulbi.ac.id</a></li>
                </ul>
              </div>
    
              <!-- Kolom 3: Layanan Kami -->
              <div class="col-lg-4 col-md-6 footer-links">
                  <h4>Link Terkait</h4>
                  <ul>
                    <li>➝ <a href="#">Penerimaan Mahasiswa Baru (Admission)</a></li>
                    <li>➝ <a href="#">Sistem Informasi Akademik (SIP)</a></li>
                    <li>➝ <a href="#">Virtual Learning (VL)</a></li>
                    <li>➝ <a href="#">Sistem Informasi Sumberdaya Terintegrasi</a></li>
                    <li>➝ <a href="#">Endowment</a></li>
                    <li>➝ <a href="#">Asrama Kampus & Kost</a></li>
                  </ul>
              </div>
    
            </div>
          </div>
        </div>
    
        <div class="container">
          <div class="copyright">
            &copy; 2025 <strong><span> Universitas Logistik dan Bisnis Internasional (ULBI)</span></strong>. All Rights Reserved
          </div>
        </div>
      </footer><!-- End Footer -->
    <!-- End Footer -->
@endsection

    @push('after-scripts')
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/front/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/front/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/front/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/front/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/front/js/main.js')}}"></script>
        @endpush
 