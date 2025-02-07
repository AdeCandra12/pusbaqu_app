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
                    <!-- Informasi Footer -->
                    <div class="col-lg-4 col-md-6 footer-info">
                        <h3>Pusba</h3>
                        <p>
                            A108 Adam Street <br>
                            NY 535022, USA<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-google"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    @endsection



    @push('after-scripts')
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    
    @endpush
