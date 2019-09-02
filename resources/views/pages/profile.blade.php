@extends('layouts.app')

@section('content')
     <section id="profile">
          <div class="left">
               <ul>
                    <li>
                         <a href="{{ route('user.profile', $user->username) }}" class="text-black">
                              <i class="fas fa-user"></i> Profile
                         </a>
                    </li>
                    <li>
                         <a href="{{ route('history') }}" class="text-black">
                              <i class="fas fa-history"></i> Riwayat
                         </a>
                    </li>
                    <li>
                         <a href="{{ route('notif.index') }}" class="text-black" id="notif"
                              data-link="{{ route('notif.update', auth()->user()->id) }}"
                              >
                              <i class="fas fa-bell"></i> Notifikasi
                         </a>
                         {{-- @if (auth()->user()->role_id === 3)
                              @if(\App\Notif::where('transportation_id', auth()->user()->services->transportation_id)->first()->is_read === 0)
                             <div class="dot-notif"></div>
                             @endif
                         @else
                             @if(\App\Notif::where('user_id', auth()->user()->id)->first()->is_read === 0)
                             <div class="dot-notif"></div>
                             @endif
                         @endif --}}
                         @if (\App\Notif::where('user_id', auth()->user()->id)->first()->is_read === 0)
                              <div class="dot-notif"></div>
                         @endif
                    </li>
                    <li>
                         <a href="{{ route('user.setting') }}" class="text-black">
                              <i class="fas fa-cog"></i> Pengaturan
                         </a>
                    </li>
                    <li>
                         <form action="{{ route('logout') }}" method="post">
                              {{ csrf_field() }}
                              <button type="submit" class="btn-logout">
                                   <i class="fas fa-power-off"></i> Logout
                              </button>
                         </form>
                    </li>
               </ul>
          </div>

          <div class="right">
               @include('layouts.partials.profile.profile')
          </div>
     </section>
@endsection

@push('script')
     <script>
          $('#navbar').addClass('bg-white');

          $('.navbar-li .navbar-link').removeClass('text-white');

          $('.navbar-li .navbar-link').addClass('text-black');

          $('.toggle-menu i.fa-bars').attr('style', 'color:#000');

     </script>
@endpush