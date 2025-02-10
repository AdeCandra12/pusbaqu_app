@extends('layouts.master')
@section('title', 'Pusba - detail pendaftaran')
@section('content')

<header id="header">
  <div class="container">

    <div class="logo float-left">
      <a href="{{route('front.index')}}"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>
    </div>
    <x-nav-pusba/>
  </div>
</header><!-- End Header -->
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/toeic.png') }}');">
                    <div class="carousel-container">
                        <div class="carousel-content text-center">
                            <!-- Optional heading atau subjudul di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Detail Pendaftaran</h2>
        </div>
        <div class="row">
            <!-- Informasi Pendaftar -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" value="{{ optional($registration->registrant)->name ?? '-' }}" disabled>
                </div>
                <div class="form-group">
                    <label for="birthdate">Tanggal Lahir</label>
                    <input type="text" class="form-control" 
                        value="{{ optional($registration->registrant)->date_of_birth ? \Carbon\Carbon::parse($registration->registrant->date_of_birth)->format('d M Y') : '-' }}" 
                        disabled>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ optional($registration->registrant)->gender ?? '-' }}" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">No HP</label>
                    <input type="tel" class="form-control" value="{{ optional($registration->registrant)->phone ?? '-' }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ optional($registration->registrant)->email ?? '-' }}" disabled>
                </div>
                <div class="form-group">
                    <label for="npm_nik">NPM/NIK</label>
                    <input type="text" class="form-control" value="{{ optional($registration->registrant)->npm_nik ?? '-' }}" disabled>
                </div>
            </div>

            <!-- Detail Pendaftaran -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="form-group">
                    <label for="origin">Asal Pendaftar</label>
                    <input type="text" class="form-control" value="{{ optional($registration->registrant)->registrant_type ?? '-' }}" disabled>
                </div>

                @if($slug === 'tes-kemampuan-bahasa-inggris')
                    <div class="form-group">
                        <label for="program">Program Studi</label>
                        <input type="text" class="form-control" value="{{ optional($registration->studyProgram)->name ?? '-' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="test_date">Tanggal Test</label>
                        <input type="text" class="form-control" 
                            value="{{ optional($registration->schedule)->test_date ? \Carbon\Carbon::parse($registration->schedule->test_date)->format('d M Y') : '-' }}" 
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="test_category">Jenis Test</label>
                        <input type="text" class="form-control" value="{{ optional($registration->testCategory)->name ?? '-' }}" disabled>
                    </div>
                @elseif($slug === 'kursus-bahasa-asing')
                    <div class="form-group">
                        <label for="course_category">Kategori Kursus</label>
                        <input type="text" class="form-control" value="{{ optional($registration->courseCategory)->name ?? '-' }}" disabled>
                    </div>
                @elseif($slug === 'penerjemahan-dokumen')
                    <div class="form-group">
                        <label for="translation_category">Kategori Penerjemahan</label>
                        <input type="text" class="form-control" value="{{ optional($registration->translationCategory)->name ?? '-' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="document_file">Dokumen Terjemahan</label>
                        @if($registration->document_file)
                            <br>
                            <a href="{{ asset('storage/' . $registration->document_file) }}" target="_blank" class="btn btn-primary">Lihat Dokumen</a>
                        @else
                            <p class="text-danger">Tidak ada dokumen</p>
                        @endif
                    </div>
                @endif

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" value="{{ $registration->status ?? '-' }}" disabled>
                </div>

                <!-- Upload Bukti Bayar -->
                <div class="form-group">
                    <label for="payment_proof">Bukti Pembayaran</label>
                    @if(!empty($registration->payment_proof))
                        <br>
                        <a href="{{ asset('storage/' . $registration->payment_proof) }}" target="_blank" class="btn btn-success">
                            Lihat Bukti Bayar
                        </a>
                    @else
                        <p class="text-danger">Belum ada bukti pembayaran</p>
                    @endif
                </div>
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
