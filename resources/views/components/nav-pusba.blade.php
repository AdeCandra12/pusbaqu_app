
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img 
                            src="{{Storage::url(Auth::user()->photo)}}" 
                            alt="{{ Auth::user()->name }}" 
                            class="rounded-circle" 
                            style="width: 30px; height: 30px; object-fit: cover;">
                        <span class="ml-2">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('front.history') }}">History</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
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
