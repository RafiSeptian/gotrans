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
                                Home
                           </a>
                           Contact
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
               <img src="{{ asset('assets/images/maps.png') }}" alt="">
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