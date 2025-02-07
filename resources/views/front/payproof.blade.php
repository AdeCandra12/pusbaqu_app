@extends('layouts.master')

@section('title', 'Pusba - Upload Bukti Pembayaran')

@section('content')

<header id="header">
    <div class="container">
        <div class="logo float-left">
            <a href="{{ route('front.index') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>
        </div>
        <x-nav-pusba/>
    </div>
</header><!-- End Header -->

<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/toeic.png') }}');">
                    <div class="carousel-container">
                        <div class="carousel-content text-center">
                            <h2 class="animated fadeInDown">Upload <span>Bukti Pembayaran</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Upload Bukti Pembayaran</h2>
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
                        <p class="text-success mt-2">Status: <strong>{{ $registration->status }}</strong></p>
                    @else
                        <form action="{{ route('front.payproof.submit', ['slug' => $slug, 'id' => $registration->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="payment_proof" class="form-control" required>
                            <button type="submit" class="btn btn-primary mt-2">Upload</button>
                            <small class="text-muted d-block mt-1">
                                Setelah bukti bayar dikirim, status Anda akan berubah menjadi <strong>"Menunggu Konfirmasi"</strong>.
                            </small>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Detail Pendaftaran Section -->
@endsection

@push('after-scripts')
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
