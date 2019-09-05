<section id="form-comment">
    <h1 class="section-title">Tulis Komentarmu</h1>
    <form action="{{ route('comment.post') }}" method="post" class="form-comment">

        {{ csrf_field() }}

            {{-- <div class="userdata">
                <div class="username">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Nama lengkap">
                </div>
                <div class="email">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="example@example.com">
                </div>
            </div> --}}
            <div class="message">
                <input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}">
                <textarea name="content" id="message"
                    @if (Auth::guest())
                        disabled
                        placeholder="Silahkan Login untuk berkomentar"
                    @endif
                placeholder="Ketikan Komentarmu..."></textarea>
            </div>
            <button type="submit" class="btn-send"
            @if (Auth::guest())
                disabled 
            @endif
            >Kirim Komentar</button>
    </form>
</section>
