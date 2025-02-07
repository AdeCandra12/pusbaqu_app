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
            
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators" id="hero-carousel-indicators">
                @foreach($sliders as $key => $slide)
                    <li data-target="#heroCarousel" 
                        data-slide-to="{{ $key }}" 
                        class="{{ $key === 0 ? 'active' : '' }}">
                    </li>
                @endforeach
            </ol>

            <!-- Carousel Inner -->
            <div class="carousel-inner" role="listbox">
              @foreach($sliders as $key => $slide)
                  <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                      <!-- Gambar slider -->
                      <img src="{{ Storage::url($slide->thumbnail) }}" 
                           class="d-block w-100" 
                           alt="Slide Image">
                  </div>
              @endforeach
          </div>

            <!-- Carousel Controls (Arrows) -->
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>

        </div>
    </div>
</section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="{{asset('assets/front/img/about.jpg')}}" class="img-fluid" alt="About Us Image">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Tentang Kami</h2>
              <p class="about-text" style="text-align: justify;">Di Pusat Bahasa ULBI, kami berkomitmen untuk memberdayakan individu
                dengan keterampilan bahasa yang penting untuk kesuksesan global. Misi kami adalah menjembatani hambatan
                bahasa dan membuka pintu menuju peluang baru, memungkinkan komunikasi yang efektif dalam beragam bahasa.
                Melalui program kami, kami berupaya meningkatkan pengalaman akademik dan profesional, memperkuat
                pemahaman budaya, dan mempromosikan koneksi global yang bermakna.

                Baik Anda individu yang ingin meningkatkan kemampuan berbahasa atau perusahaan yang ingin memperluas
                kehadiran internasional, ULBI Language Centers adalah mitra Anda dalam meraih keunggulan linguistik dan
                mengoptimalkan potensi Anda. Bergabunglah dengan kami dalam perjalanan menuju penguasaan bahasa dan
                keterlibatan global.</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services py-5">
      <div class="container">
          <div class="section-title text-center mb-5">
              <h2>Layanan</h2>
          </div>
          <div class="row">
              @foreach ($categories as $category)
                  <div class="col-lg-4 col-md-6 icon-box justify-content-center">
                      <div class="card h-100 text-center shadow-card" data-aos="fade-up">
                          <div class="card-body">
                              <!-- Icon -->
                              <div class="icon mb-3"><i class="icofont-paper"></i></div>
                              <!-- Nama Kategori -->
                              <h4 class="card-title">
                                  <a href="{{ route('front.forms', $category->slug) }}">{{ $category->name }}</a>
                              </h4>
                              <!-- Deskripsi Kategori -->
                              <p class="card-text">{!!( $category->description ?? 'Deskripsi tidak tersedia.' )!!}</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
    
    <!-- End Services Section -->

       <!-- ======= Berita Section ====== -->

       <section id="berita" class="berita-section">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terkini</h2>
            </div>
    
            <div class="berita-container row">
                @foreach($news as $item)
                    <div class="berita-item col-lg-4 col-md-6" onclick="location.href='{{ route('news.show', $item->slug) }}'">
                        <!-- Gambar Berita -->
                        <img src="{{ $item->thumbnail ? Storage::url($item->thumbnail) : asset('assets/front/img/default-news.png') }}" alt="{{ $item->title }}">
    
                        <!-- Judul Berita -->
                        <h3>{{ Str::limit($item->title, 60) }}</h3>
    
                        <!-- Deskripsi Singkat -->
                        <p>{!! Str::limit($item->content, 150) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
      
    <!-- End Berita Section -->  

    <!-- ======= Our Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2>Tutor</h2>
        </div>

        <div class="row">
            @foreach($tutors as $tutor)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="member">
                        <!-- Gambar Tutor -->
                        <div class="pic">
                            <img 
                                src="{{ $tutor->photo ? Storage::url($tutor->photo) : asset('assets/front/img/default-profile.png') }}" 
                                class="img-fluid" 
                                alt="{{ $tutor->name }}">
                        </div>

                        <!-- Informasi Tutor -->
                        <div class="member-info">
                            <h4>{{ $tutor->name }}</h4>
                            <span>{{ $tutor->position }}</span>
                            <div class="social">
                              <a href="tel:{{ $tutor->phone_number }}"><i class="icofont-phone"></i></a>
                              <a href="mailto:{{ $tutor->email }}"><i class="icofont-email"></i></a>
                              <a href="https://instagram.com/{{ $tutor->instagram }}" target="_blank"><i class="icofont-instagram"></i></a>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section><!-- End Our Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row d-flex align-items-stretch">
          @foreach($faqs as $index => $faq)
              <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                  <h4>{{ $faq->question }}</h4>
                  <p>{{ $faq->answer }}</p>
              </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- Kolom 1: Informasi Footer -->
          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Mamba</h3>
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
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <!-- Kolom 2: Tautan Bermanfaat -->
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <!-- Kolom 3: Layanan Kami -->
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
 



