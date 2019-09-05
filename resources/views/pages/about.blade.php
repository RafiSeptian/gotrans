@extends('layouts.app')

@section('content')
<section id="about">
     <div class="page-header">
          <div class="hero-wrapper">
               <h1 class="page-title text-white">
                   Tentang Kami
               </h1>
               <div class="bc-hero">
                      <a href="{{ route('home') }}" class="bc-link">
                           Beranda
                      </a>
                      Tentang
               </div>
           </div>
     </div>
 
     <div class="about-company">
          <div class="left">
               <img src="{{ asset('assets/images/company.png') }}" alt="">
          </div>

          <div class="right">
               <div class="our-vision">
                    <h2 class="sub-title txt-center">
                         Visi GoTrans
                    </h2>
                    <p>
                         Visi GoTrans antara lain: 
                         <ul>
                              <li>Mengurangi antrian transportasi di pinggir jalan</li>
                              <li>Memudahkan masyarakat untuk mendapatkan transportasi</li>
                              <li>Mempermudah masyarakat mendapatkan layanan transportasi terbaik</li>
                         </ul>
                    </p>
               </div>

               <div class="our-mission">
                    <h2 class="sub-title txt-center">
                         Misi GoTrans
                    </h2>
                    <p>
                         Misi GoTrans antara
                         <ul>
                              <li>Menjadikan GoTrans sebagai jasa transportasi termudah</li>
                              <li>Menghadirkan kenyamanan bagi penikmat transportasi</li>
                              <li>Meningkatkan pendapatan sopir transportasi umum</li>
                         </ul>
                    </p>
               </div>
          </div>
     </div>

     <div class="our-dev">
          <h1 class="section-title2">
               Tim Pendiri GoTrans
          </h1>
          <p class="sub-section">
               Mari berkenalan dengan tim kami yang sangat professional
          </p>

          <div class="dev-wrapper">
               <div class="dev-1">
                    <img src="{{ asset('assets/images/dev-1.png') }}" alt="" class="img-dev">
                    <h3 class="title bold">
                         Indah Permatasari
                    </h3>
                    <p class="normal">
                         CEO
                    </p>
               </div>

               <div class="dev-2">
                    <img src="{{ asset('assets/images/dev-2.png') }}" alt="" class="img-dev">
                    <h3 class="title bold">
                         Helmi
                    </h3>
                    <p class="normal">
                         Back-End Developer
                    </p>
               </div>

               <div class="dev-3">
                    <img src="{{ asset('assets/images/dev-3.png') }}" alt="" class="img-dev">
                    <h3 class="title bold">
                         Emmy
                    </h3>
                    <p class="normal">
                         Front-End Developer
                    </p>
               </div>

               <div class="dev-3">
                    <img src="{{ asset('assets/images/dev-4.png') }}" alt="" class="img-dev">
                    <h3 class="title bold">
                         David
                    </h3>
                    <p class="normal">
                         Analyze
                    </p>
               </div>
          </div>
     </div>
</section>
@endsection

@push('script')
     <script>
          // navbar
        $(window).scroll(function () {
            const scroll = $(this).scrollTop();

            if (scroll > 10) {

                $('body').on('click', '.toggle-menu i.fa-times', function(){
                    $('#navbar').addClass('bg-white');
                })

                $('#navbar').addClass('bg-white');

                $('.navbar-li .navbar-link').addClass('text-black');
                $('.navbar-li .navbar-link').removeClass('text-white');
                
                if($(window).width() < 680){
                    $('.toggle-menu i.fa-bars').attr('style', 'color:#000');
                    $('.sidebar-wrapper').hasClass('active') ? $('.toggle-menu i.fa-bars').attr('style', 'display:none') : $('.toggle-menu i.fa-bars').attr('style', 'display:block; color:#000');
                }
                
            } else{

                $('#navbar').removeClass('bg-white');
                
                if ($(window).width() < 680) {

                    $('.sidebar-wrapper').hasClass('active') ? $('#navbar').addClass('bg-white') : $('#navbar').removeClass('bg-white')
                
                    $('body').on('click', '.toggle-menu i.fa-times', function(){
                        $('#navbar').removeClass('bg-white');
                    })
                    
                    $('.toggle-menu i.fa-bars').removeAttr('style');
                    
                    // $('.toggle-menu i.fa-bars').attr('style', 'color:#fff');
                    $('.sidebar-wrapper').hasClass('active') ? $('.toggle-menu i.fa-bars').attr('style', 'display:none') : $('.toggle-menu i.fa-bars').attr('style', 'display:block; color:#fff');

                }

                    $('.navbar-li .navbar-link').removeClass('text-black');
                    $('.navbar-li .navbar-link').addClass('text-white');
            }

        });
     </script>
@endpush