@extends('layouts.master')
@section('title', 'Pusba - History')
@section('content')

<header id="header">
  <div class="container">

    <div class="logo float-left">
      <a href="{{route('front.index')}}"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>
    </div>
    <x-nav-pusba/>
  </div>
</header><!-- End Header -->

<body class="single">
    <div id="fh5co-title-box"
    style="background-image: url({{ asset('storage/' . $newsItem->thumbnail) }}); background-position: center;" data-stellar-background-ratio="0.5"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <span>{{ $newsItem->publish_date }}</span>
            <h2>{{ $newsItem->title }}</h2>
        </div>
    </div>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <h2 class="mb-3">{{ $newsItem->title }}</h2>
                        <p class="text-muted"><i class="fa fa-calendar"></i> {{ $newsItem->publish_date}} | <i class="fa fa-folder"></i> {{ $newsItem->category }}</p>
                        <hr>
                        <div class="news-content" style="line-height: 1.8; font-size: 1.1rem;">
                            {!! Str::markdown($newsItem->content) !!}
                        </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="{{ $newsItem->thumbnail ? Storage::url($newsItem->thumbnail) : asset('assets/front/img/default-news.png') }}" alt="{{ $newsItem->title }}" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-10 pading">
                            <div class="most_fh5co_treding_font"> {{ $newsItem->category }}
                            </div>
                            <div class="most_fh5co_treding_font_123"> {{ $newsItem->publish_date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($trendingNews as $item)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}">
                            </div>
                            <div>
                                <a href="{{ route('news.show', $item->slug) }}" class="d-block fh5co_small_post_heading">
                                    <span>{{ $item->title }}</span>
                                </a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{ $item->publish_date}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

    @endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
    <!-- Waypoints -->
    <script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <!-- Parallax -->
    <script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
    <!-- Main -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) { $(window).stellar(); }</script>
@endpush