<nav id="navbar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="GoTrans">
        </a>
    </div>
        <ul class="navbar-ul">
            <li class="navbar-li">
            <a href="{{ route('news.index') }}" class="navbar-link text-white">
                    Berita
                </a>
            </li>
            <li class="navbar-li">
                <a href="{{ route('contact') }}" class="navbar-link text-white">
                    Hubungi Kami
                </a>
            </li>
            <li class="navbar-li">
                <a href="{{ route('about') }}" class="navbar-link text-white">
                    Tentang
                </a>
            </li>
            @if (Auth::guest())
            <li class="navbar-li">
                <a href="{{ route('login.show') }}" class="btn-link" id="btn-login">
                    Login
                </a>
            </li>
            @else 
            <li class="navbar-li">
                <a href="{{ route('user.show', auth()->user()['username']) }}">
                    <img src="{{ Voyager::image(Auth::user()->avatar) }}" alt="" class="img-user">
                </a>
            </li>
            @endif
            <div class="toggle-menu">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </div>
        </ul>
</nav>