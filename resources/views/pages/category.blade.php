@extends('layouts.app')

@section('content')
<div class="breadcrumbs-heading">
    <h1 class="post-title">{{ ucfirst($data->name) }}</h1>
    <div class="link" style="float:right;">
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="breadcrumbs-item">
                <a href="{{ route('news.index') }}">Berita</a>
            </li>
            <li class="breadcrumbs-item">
               {{ ucfirst($data->name) }}
          </li>
        </ul>
    </div>
</div>

<section id="main-news">
    <div class="news-wrapper">
        <div class="content">
          @if ($data->news->isEmpty())
               <h1 class="title not-found">
                    Tidak ada berita terkait
               </h1>
          @else
               @foreach ($data->news as $news)
                    <img src="{{ asset('storage/' . $news->images) }}" alt="" class="news-img">
                    <ul class="header">
                         <li>
                              <i class="fas fa-calendar-alt"></i>
                              {{ \Jenssegers\Date\Date::parse($news->created_at)->format('d F Y') }}
                         </li>
                         <li>
                              <i class="fas fa-folder"></i> {{ ucfirst($data->name) }}
                         </li>
                         <li>
                              <i class="fas fa-comments"></i> {{ count($news->comment) }} Komentar
                         </li>
                    </ul>
                    <h1 class="news-title">
                         {{ $news->title }}
                    </h1>
                    {!! $news->content !!}

                    <a href="{{ route('news.show', $news->slug) }}" class="btn-more">
                         Selengkapnya
                    </a>
               @endforeach
          @endif
        </div>

        @include('layouts.partials.news-ref')
    </div>
</section>
@endsection

@push('script')
<script>
          $('#navbar').addClass('bg-white');
          $('.toggle-menu i').attr('style', 'color:#000');
          $('.navbar-li .navbar-link').removeClass('text-white');
          $('.navbar-li .navbar-link').addClass('text-black');
</script>
@endpush
