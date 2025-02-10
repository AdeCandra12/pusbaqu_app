@extends('layouts.master')
@section('title', 'Pusba - Home')
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
                    <div class="carousel-item active" style="background-image: url('{{ asset('assets/front/img/slide/slide-1.jpg') }}');">
                        <div class="carousel-container">
                            <div class="carousel-content text-center">
                                <h2 class="animated fadeInDown">Riwayat <span>Test</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="text-lg-center">Riwayat Pendaftaran Layanan</h6>
    
              <!-- 📌 **TEST PREDICTION** -->
                @if($testRegistrations->isNotEmpty())
                <h5 class="mt-4 text-primary">📖 Test Prediction</h5>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NPM/NIK</th>
                            <th>Asal</th>
                            <th>Program Studi</th>
                            <th>Tanggal Test</th>
                            <th>Kategori Test</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testRegistrations as $registration)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($registration->registrant)->name ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->email ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->npm_nik ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->registrant_type ?? '-' }}</td>
                                <td>{{ optional($registration->studyProgram)->name ?? '-' }}</td>
                                <td>{{ optional($registration->schedule)->test_date ? \Carbon\Carbon::parse($registration->schedule->test_date)->format('d M Y') : '-' }}</td>
                                <td>{{ optional($registration->testCategory)->name ?? '-' }}</td>
                                <td>{{ $registration->status }}</td>
                                <td style="display: flex; gap: 10px;">
                                    <a class="btn btn-info btn-sm" 
                                    href="{{ route('front.detail', ['slug' => 'tes-kemampuan-bahasa-inggris', 'id' => $registration->id]) }}">
                                    Detail
                                    </a>
                                    <a class="btn btn-warning btn-sm" 
                                    href="{{ route('front.payproof', ['slug' => 'tes-kemampuan-bahasa-inggris', 'id' => $registration->id]) }}">
                                    Bukti Bayar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <!-- 📌 **KURSUS BAHASA** -->
                @if($courseRegistrations->isNotEmpty())
                <h5 class="mt-4 text-success">📚 Kursus Bahasa</h5>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NPM/NIK</th>
                            <th>Asal</th>
                            <th>Program Studi</th>
                            <th>Kategori Kursus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courseRegistrations as $registration)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($registration->registrant)->name ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->email ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->npm_nik ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->registrant_type ?? '-' }}</td>
                                <td>{{ optional($registration->studyProgram)->name ?? '-' }}</td>
                                <td>{{ optional($registration->courseCategory)->name ?? '-' }}</td>
                                <td>{{ $registration->status }}</td>
                                <td style="display: flex; gap: 10px;">
                                    <a class="btn btn-info btn-sm" 
                                    href="{{ route('front.detail', ['slug' => 'kursus-bahasa-asing', 'id' => $registration->id]) }}">
                                    Detail
                                    </a>
                                    <a class="btn btn-warning btn-sm" 
                                    href="{{ route('front.payproof', ['slug' => 'kursus-bahasa-asing', 'id' => $registration->id]) }}">
                                    Bukti Bayar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <!-- 📌 **PENERJEMAHAN DOKUMEN** -->
                @if($translationRegistrations->isNotEmpty())
                <h5 class="mt-4 text-danger">📄 Penerjemahan Dokumen</h5>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NPM/NIK</th>
                            <th>Asal</th>
                            <th>Kategori Terjemahan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($translationRegistrations as $registration)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($registration->registrant)->name ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->email ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->npm_nik ?? '-' }}</td>
                                <td>{{ optional($registration->registrant)->registrant_type ?? '-' }}</td>
                                <td>{{ optional($registration->translationCategory)->name ?? '-' }}</td>
                                <td>{{ $registration->status }}</td>
                                <td style="display: flex; gap: 10px;">
                                    <a class="btn btn-info btn-sm" 
                                    href="{{ route('front.detail', ['slug' => 'penerjemahan-dokumen', 'id' => $registration->id]) }}">
                                    Detail
                                    </a>
                                    <a class="btn btn-warning btn-sm" 
                                    href="{{ route('front.payproof', ['slug' => 'penerjemahan-dokumen', 'id' => $registration->id]) }}">
                                    Bukti Bayar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif  
            </div>
        </div>
    </section>
    <!-- End Tabel Riwayat Pendaftaran -->
    
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
    <script src="{{ asset('assets/front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    
    @endpush
