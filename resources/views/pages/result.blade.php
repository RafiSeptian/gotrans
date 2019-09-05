@extends('layouts.app')

@section('content')
<section id="news-header">
    <div class="page-header">
        <div class="hero-wrapper">
            <h1 class="page-title text-white">
                Berita
            </h1>
            <div class="bc-hero">
                <a href="{{ route('home') }}" class="bc-link">
                    Home
                </a>
                Berita
            </div>
        </div>
    </div>
</section>

<section id="main-news">
    <div class="news-wrapper">
        <div class="content">
            @if (count($news) >= 1)
                @foreach ($news as $data)
                <img src="{{ asset('storage/' . $data->images) }}" alt="" class="news-img">
                <ul class="header">
                    <li>
                        <i class="fas fa-calendar-alt"></i> {{ \Jenssegers\Date\Date::parse($data->created_at)->format('d F Y') }}
                    </li>
                    <li>
                        <i class="fas fa-folder"></i> {{ ucfirst($data->category->name) }}
                    </li>
                    <li>
                        <i class="fas fa-comments"></i> {{ count($data->comment) }} Komentar
                    </li>
                </ul>
                <h1 class="news-title">
                    {{ $data->title }}
                </h1>
                <p class="content-desc">
                    {!! $data->content !!}
                </p>
                <a href="{{ route('news.show', $data->slug) }}" class="btn-more">
                    Selengkapnya
                </a>
                @endforeach
                @else 
                <h1 class="title not-found" style="">
                    Tidak ada Berita Terkait
                </h1>
            @endif

            <div class="pagination">
                {{ $news->links() }}
            </div>
        </div>

        @include('layouts.partials.news-ref')
    </div>
</section>
@endsection

@push('script')
<script>
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

</script>
@endpush
