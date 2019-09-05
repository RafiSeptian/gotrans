@extends('layouts.app')

@section('content')
     <section id="contact">
          <div class="page-header">
               <div class="hero-wrapper">
                    <h1 class="page-title">
                        Hubungi Kami
                    </h1>
                    <div class="bc-hero">
                           <a href="{{ route('home') }}" class="bc-link">
                              Beranda
                           </a>
                           Hubungi kami
                    </div>
                </div>
          </div>

          <div class="contact-wrapper">
               <div class="text">
                    <h1 class="section-title2">
                         Hubungi kami jika memiliki pertanyaan seputar GoTrans, kami akan senang hati akan menjawab
                    </h1>

                    <p class="normal">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quibusdam voluptatum delectus blanditiis? Maxime aliquid facere cumque quia consequatur? Natus amet commodi illo quasi molestias doloribus obcaecati rem similique facere?
                    </p>

                    <ul style="list-style:none; padding:0;">
                         <li>
                              <i class="fas fa-map-marker"></i> Jln.Ahmad Yani No.35 Jakarta Pusat
                         </li>
                         <li>
                              <i class="fas fa-phone"></i> +62 834 4938 4838
                         </li>
                         <li>
                              <i class="fas fa-envelope"></i> GoTransSub@Gt.com
                         </li>
                    </ul>
               </div>

               <div class="contact-form">
                    @include('layouts.forms.contact')
               </div>
          </div>

          <div class="maps">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.718187722163!2d107.43983801415688!3d-6.557215595257434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e51b17da767%3A0xc432be613ba1249f!2sKantor%20Diskominfo%20Kab.%20Purwakarta!5e0!3m2!1sid!2sid!4v1567507349089!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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