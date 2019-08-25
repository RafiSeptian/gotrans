@extends('layouts.app')

@section('content')
     <section id="profile">
          <div class="left">
               <ul>
                    <li>
                         <a href="">
                              <i class="fas fa-user"></i> Profile
                         </a>
                    </li>
                    <li>
                         <a href="">
                              <i class="fas fa-history"></i> Riwayat
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
               <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-profile" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="img-profile">
                         <img src="{{ asset('storage/' . $user->avatar) }}" alt="" id="img-user">
                         <input type="file" name="avatar" id="avatar" onchange="preview(event)">
                    </div>

                    <div class="group-form">
                         <label for="name">Nama lengkap</label>
                         <div class="form-wrapper">
                              <input type="text" name="name" id="name" value="{{ $user->name }}">
                         </div>
                    </div>

                    <div class="group-form">
                         <label for="name">Username</label>
                         <div class="form-wrapper">
                              <input type="text" name="username" id="username" value="{{ $user->username }}">
                         </div>
                    </div>

                    <div class="group-form">
                         <label for="name">E-mail</label>
                         <div class="form-wrapper">
                              <input type="email" name="email" id="email" value="{{ $user->email }}">
                         </div>
                    </div>
                    
                    <div class="group-form">
                         <label for="name">Alamat</label>
                         <div class="form-wrapper">
                              <input type="text" name="address" id="address" value="{{ $user->address ? $user->address : '' }}">
                         </div>
                    </div>
                    
                    <button type="submit" class="btn-send p-right" style="margin-top:12px;">
                         Simpan
                    </button>
               </form>
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