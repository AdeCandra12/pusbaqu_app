
        <!-- Navigation Menu -->
        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#header">Beranda</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="#news">Berita</a></li>
                <li><a href="#team">Tutor</a></li>
                <li><a href="#faq">FAQ</a></li>
                
                @auth
                <!-- User Profile Widget -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-expanded="false">
                        <img 
                            src="{{ Auth::user()->photo ? Storage::url(Auth::user()->photo) : asset('assets/img/default-profile.png') }}" 
                            alt="{{ Auth::user()->name }}" 
                            class="rounded-circle border" 
                            style="width: 35px; height: 35px; object-fit: cover;">
                        <span class="ml-2 font-weight-bold text-dark">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2 text-muted"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right shadow p-3">
                        <li class="dropdown-header text-center">
                            <strong>{{ Auth::user()->name }}</strong>
                            <p class="text-muted small mb-2">{{ Auth::user()->email }}</p>
                        </li>
                        <li><a href="{{ route('front.history') }}" class="dropdown-item d-flex align-items-center">
                            <i class="fas fa-history mr-2"></i> History
                        </a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <!-- Login and Register Buttons -->
                <li>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm ml-2">Register</a>
                </li>
                @endauth
            </ul>
        </nav>
</header>
