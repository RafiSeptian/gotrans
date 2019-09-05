@extends('layouts.app')

@section('content')

<section id="header">
    <div class="wrapper wow slideInUp">
        <h1 class="hero-title">
            Memberikan layanan keamanan dan kenyamanan bertransportasi
        </h1>
        <p class="txt-shadow">
            Menginginkan transportasi yang aman dan nyaman? <br>
            <strong>GoTrans</strong> solusi untuk anda
        </p>
        @if (Auth::check())
        @if (auth()->user()->role_id === 2)
        <button class="btn-start" id="start">
            Pesan Driver
        </button>
        @elseif(auth()->user()->role_id === 3)
        <a href="{{ route('user.show', auth()->user()->username) }}" class="btn-link">
            Lihat Profile
        </a>
        @endif
        @else
        <button class="btn-start" id="btn-register">
            Mulai Sekarang
        </button>
        @endif
    </div>
</section>

<section id="intro">
    <div class="intro-img wow slideInLeft">
        <img src="{{ asset('assets/images/logo.png') }}" alt="">
    </div>
    <div class="intro-text wow slideInRight" data-wow-duration="2s">
        <h1>
            Apa itu GoTrans ?
        </h1>
        <p>
            GoTrans merupakan sebuah aplikasi layanan masyarakat berbasis web yang bergerak dibidang transportasi, GoTrans bertujuan untuk memberikan kenyamanan bagi sopir transportasi maupun masyarakat sebagai penikmat jasa transportasi, karena dalam aplikasi ini tersedia fitur-fitur yang dapat mendukung kegiatan-kegiatan transportasi.
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
                Keamanan sangat terjamin karena para sopir dalam aplikasi ini sudah ter-verifikasi
            </p>
        </div>
        <div class="item-two">
            <img src="{{ asset('assets/images/news.svg') }}" alt="">
            <h3 class="features-title">
                Berita terbaru
            </h3>
            <p class="features-detail">
                Untuk menambah wawasan masyarakat, kami menyediakan fitur berita untuk memberitahu masyarakat umum tentang transportasi.
            </p>
        </div>
        <div class="item-three">
            <img src="{{ asset('assets/images/choose.svg') }}" alt="">
            <h3 class="features-title">
                Lihat Riwayat
            </h3>
            <p class="features-detail">
                Dalam aplikasi ini kita bisa melihat riwayat transportasi yang kita lakukan
            </p>
        </div>
    </div>
</section>

<section id="news">
    <h1 class="section-title">
        Berita Mingguan
    </h1>
    <div class="news-wrapper wow fadeInUp" data-wow-duration="2s">
        @foreach ($news as $data)
        <div class="news-content">
            <img src="{{ asset('storage/'. $data->images) }}" alt="" class="news-img">
            <div class="news-item">
                <i class="far fa-calendar-alt"></i>
                {{ \Jenssegers\Date\Date::parse($data->created_at)->format('d F Y') }}
                <i class="far fa-folder"></i>
                @if ($data->category !== null)
                {{ ucfirst($data->category->name) }}
                @else
                Tidak ada
                @endif
                <i class="far fa-comments"></i> {{ count($data->comment) }} Komentar
            </div>
            <h2 class="news-title">
                {{ $data->title }}
            </h2>
            <a href="{{ route('news.show', $data->slug) }}" class="btn-more">Selengkapnya</a>
        </div>
        @endforeach
    </div>
</section>

<div class="convincing">
    <div class="wow fadeIn" data-wow-duration="2s">
            <p>
                    Kami berupaya untuk menjadikan transpotasi di Subang menjadi lebih tertib dan nyaman dalam melayani masyarakat
                    Subang
                </p>
                <img src="{{ asset('assets/images/dev-1.png') }}" alt="" class="img-ceo">
                <h3 class="name-ceo">Indah Permatasari</h3>
                <h5 class="position">
                    CEO GoTrans
                </h5>
    </div>
</div>

<section id="review-user">
    <div class="review-text">
        <div class="content active" data-text="1">
            <p>
                &quot;
                Sangat memudahkan 
                &quot;
            </p>
            <h3 class="name-user">
                Angela
            </h3>
        </div>
        <div class="content" data-text="2">
            <p>
                &quot;
                Horee , Sopir transportasi jadi jarang ngetem
                &quot;
            </p>
            <h3 class="name-user">
                Emmy
            </h3>
        </div>
        <div class="content" data-text="3">
            <p>
                &quot;
                    Mantap sekali !
                &quot;
            </p>
            <h3 class="name-user">
                Alex
            </h3>
        </div>
    </div>

    <div class="review-profile">
        <img src="{{ asset('assets/images/people1.png') }}" class="active" alt="" data-id="1">
        <img src="{{ asset('assets/images/people2.png') }}" alt="" data-id="2">
        <img src="{{ asset('assets/images/people3.png') }}" alt="" data-id="3">
    </div>
</section>
@endsection

@push('script')
<script>

    // owl carousel
    

    // WOW plugin
    const wow = new WOW();
    wow.init();

    // navbar
    $(window).scroll(function () {
        const scroll = $(this).scrollTop();

        if (scroll > 10) {

            $('body').on('click', '.toggle-menu i.fa-times', function () {
                $('#navbar').addClass('bg-white');
            })

            $('#navbar').addClass('bg-white');

            $('.navbar-li .navbar-link').addClass('text-black');
            $('.navbar-li .navbar-link').removeClass('text-white');

            if ($(window).width() < 680) {
                $('.toggle-menu i.fa-bars').attr('style', 'color:#000');
                $('.sidebar-wrapper').hasClass('active') ? $('.toggle-menu i.fa-bars').attr('style',
                    'display:none') : $('.toggle-menu i.fa-bars').attr('style', 'display:block; color:#000');
            }

        } else {

            $('#navbar').removeClass('bg-white');

            if ($(window).width() < 680) {

                $('.sidebar-wrapper').hasClass('active') ? $('#navbar').addClass('bg-white') : $('#navbar')
                    .removeClass('bg-white')

                $('body').on('click', '.toggle-menu i.fa-times', function () {
                    $('#navbar').removeClass('bg-white');
                })

                $('.toggle-menu i.fa-bars').removeAttr('style');

                // $('.toggle-menu i.fa-bars').attr('style', 'color:#fff');
                $('.sidebar-wrapper').hasClass('active') ? $('.toggle-menu i.fa-bars').attr('style',
                    'display:none') : $('.toggle-menu i.fa-bars').attr('style', 'display:block; color:#fff');

            }

            $('.navbar-li .navbar-link').removeClass('text-black');
            $('.navbar-li .navbar-link').addClass('text-white');
        }

    });

    $('body').on('click', '#start', function () {

        $.ajax({
            url: "{{ route('order.create') }}",
            success: function (response) {
                $('.modal-body').html(response);
                $('.modal-bg').css({
                    'display': 'block'
                });
            }
        });

    });

    $('body').on('click', '#btn-register', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('register.show') }}",
            dataType: 'html',
            success: function (res) {
                $('.modal-body').html(res);
                $('.modal-bg').show();
            }
        });
    });

</script>
@endpush
