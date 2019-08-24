@extends('layouts.app')

@section('content')
        <div class="breadcrumbs-heading">
                <h1 class="post-title">{{ $news->title }}</h1>
                <div class="link" style="float:right;">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumbs-item">
                            <a href="{{ route('news.index') }}">News</a>
                        </li>
                        <li class="breadcrumbs-item">
                            {{ $news->title }}
                        </li>
                    </ul>
                </div>
    </div>
<section id="detail-news">
    <div class="news-wrapper">
        <div class="content">
            <img src="{{ asset('storage/' . $news->images) }}" alt="" class="news-img">
            <ul class="header">
                <li>
                    <i class="fas fa-calendar-alt"></i> 7 Januari 2017
                </li>
                <li>
                    <i class="fas fa-folder"></i> Jalur Transportasi
                </li>
                <li>
                    <i class="fas fa-comments"></i> 10 Komentar
                </li>
            </ul>
            <h1 class="news-title">
                {{ $news->title }}
            </h1>
            <p class="content-desc">
                {!! $news->content !!}
            </p>
        </div>

        @include('layouts.partials.news-ref')
    </div>

    @include('layouts.partials.comment')
</section>
@include('layouts.forms.comment')
@endsection

@push('script')
    <script>
        $('#navbar').addClass('bg-white');
        $('.toggle-menu i').attr('style', 'color:#000');
        $('.navbar-li .navbar-link').removeClass('text-white');
        $('.navbar-li .navbar-link').addClass('text-black');
    </script>
@endpush
