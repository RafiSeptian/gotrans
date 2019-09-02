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
                    <i class="fas fa-comments"></i> {{ count($news->comment) }} Komentar
                </li>
            </ul>
            <h1 class="news-title">
                {{ $news->title }}
            </h1>
            <p class="content-desc">
                {!! $news->content !!}
            </p>
            @include('layouts.partials.comment')
        </div>

        @include('layouts.partials.news-ref')
    </div>

</section>

@include('layouts.forms.comment')

@endsection

@push('script')
<script>
    $('#navbar').addClass('bg-white');
    $('.toggle-menu i').attr('style', 'color:#000');
    $('.navbar-li .navbar-link').removeClass('text-white');
    $('.navbar-li .navbar-link').addClass('text-black');

    // comment
    $('body').on('submit', '.form-comment', function (e) {
        e.preventDefault();

        const url = $(this).attr('action'),
            form = $('.form-comment'),
            msg = $('#message').val(),
            id = $('#news_id').val();

        const load_comment = function () {

            $.ajax({
                url: "{{ route('comment.get', $news->id) }}",
                dataType: 'JSON',
                success: function (res) {
                    $.each(res, function (key, value) {
                        const data =
                            `<div class="netizen">
                            <img src="{{ asset('storage/` + value.user.avatar + `') }}" alt="" class="user-img">
                            <div class="text">
                                <h3 class="username">
                                    ` + value.user.username + `
                                </h3>
                                <p class="comment">
                                    ` + value.content + `
                                </p>
                            </div>
                            </div>`;

                        $('section#comments .content').append(data);
                    });
                    console.log(res);

                }
            });
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                content: msg,
                news_id: id
            },
            success: function (res) {
                if (res.msg === 'created') {
                    form[0].reset();
                    load_comment();
                }
            }
        });
    });

</script>
@endpush
