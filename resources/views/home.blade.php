
@extends('layouts.app')

@section('content')

<section id="header">
    <div class="wrapper">
        <h1 class="hero-title">
            Berkomitmen menciptakan keamanan dan kenyamanan bertransportasi
        </h1>
        <p class="txt-shadow">
            Menginginkan transportasi yang aman dan nyaman? <br>
            <strong>GoTrans</strong> solusi untuk anda
        </p>
        <button class="btn-start" id="start">
            Mulai Sekarang
        </button>
    </div>
</section>

<section id="intro">
    <div class="intro-img">
        <img src="{{ asset('assets/images/intro.svg') }}" alt="">
    </div>
                <div class="intro-text">
                    <h1>
                        Apa itu GoTrans ?
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laudantium sed dignissimos, at laboriosam excepturi similique, ab obcaecati quis iste error quibusdam iure molestias magni, expedita officiis sint eligendi rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, cumque. Delectus neque reiciendis in sit, quasi ea nulla optio pariatur possimus quidem blanditiis saepe, nam esse quae labore iure culpa.
                    </p>
                </div>
</section>

<section id="features">
    <div class="box-wrapper">
        <div class="item-one">
            <img src="{{ asset('assets/images/driver.svg') }}" alt="">
            <h3 class="features-title">
                Keamanan Terjamin
            </h3>
            <p class="features-detail">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dicta minima voluptas vel quia cumque iste repellat nemo earum.
            </p>
        </div>
        <div class="item-two">
            <img src="{{ asset('assets/images/news.svg') }}" alt="">
            <h3 class="features-title">
                Berita terbaru
            </h3>
            <p class="features-detail">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum similique eaque voluptatibus. Eligendi in eveniet, voluptates.
            </p>
        </div>
        <div class="item-three">
            <img src="{{ asset('assets/images/choose.svg') }}" alt="">
            <h3 class="features-title">
                Bebas memilih driver
            </h3>
            <p class="features-detail">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum similique eaque voluptatibus. Eligendi in eveniet, voluptates.
            </p>
        </div>
    </div>
</section>

<section id="news">
    <h1 class="section-title">
        Berita Mingguan
    </h1>
    <div class="news-wrapper">
        @foreach ($news as $data)
            <div class="news-content">
                <img src="{{ asset('storage/'. $data->images) }}" alt="" class="news-img">
                <div class="news-item">
                    <i class="far fa-calendar-alt"></i> {{ \Jenssegers\Date\Date::parse($data->created_at)->format('d F Y') }}
                    <i class="far fa-folder"></i> Category
                    <i class="far fa-comments"></i> 10 Comments
                </div>
                <h2 class="news-title">
                    {{ $data->title }}
                </h2>
                <p>
                    {!! $data->content !!}
                </p>
                <a href="{{ route('news.show', $data->slug) }}" class="btn-more">Selengkapnya</a>
            </div>
        @endforeach
    </div>
</section>

<div class="convincing">
        <p>
            Kami berupaya untuk menjadikan transpotasi di Subang menjadi lebih tertib dan nyaman dalam melayani masyarakat Subang
        </p>
        <img src="{{ asset('assets/images/people3.png') }}" alt="" class="img-ceo">
        <h3 class="name-ceo">Kang Ujang</h3>
        <h5 class="position">
            CEO GoTrans
        </h5>
</div>

<section id="review-user">
    <div class="review-text">
        <p>
            &quot;
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam quasi nihil sapiente, dolor ad quibusdam exercitationem dignissimos corporis magni nulla alias harum quod repellat natus omnis dolore recusandae! Eaque, doloribus.
            &quot;
        </p>
        <h3 class="name-user">
            Emmy
        </h3>
    </div>

    <div class="review-profile">
        <img src="{{ asset('assets/images/people1.png') }}" alt="">
        <img src="{{ asset('assets/images/people2.png') }}" alt="">
        <img src="{{ asset('assets/images/people3.png') }}" alt="">
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

        $('body').on('click', '#start', function () {

            $.ajax({
                url: "{{ route('order.index') }}",
                success: function(response){
                    $('.modal-body').html(response);
                    $('.modal-bg').css({
                        'display': 'block'
                    });
                }
            });

        });
    </script>
@endpush