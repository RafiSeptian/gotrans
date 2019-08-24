<div class="sidebar-wrapper">
    <ul>
        <li class="sidebar-item">
            <a href="{{ route('news.index') }}" class="text-black">
                Berita
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('contact') }}" class="text-black">
                Hubungi Kami
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('about') }}" class="text-black">
                Tentang
            </a>
        </li>
          @if (Auth::guest())
          <li class="sidebar-item">
               <a href="{{ route('login.show') }}" class="text-black" id="btn-login">
                    Login
               </a>
          </li>
          @else
          <li class="sidebar-item">
              <a href="{{ route('user.index') }}" class="text-black">
                  {{ Auth::user()->username }}
              </a>
          </li>
          @endif
    </ul>
</div>
