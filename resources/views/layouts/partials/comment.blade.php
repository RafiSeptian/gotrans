<section id="comments">
     
     <h1 class="section-title">Komentar ({{ count($comments) }})</h1>
     <div class="content">
          @if ($comments !== NULL)
          @foreach ($comments as $comment)
          <div class="netizen">
               <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="" class="user-img">
               <div class="text">
                    <h3 class="username">
                         {{ $comment->user->username }}
                    </h3>
                    <p class="comment">
                         {{ $comment->content }}
                    </p>
               </div>
          </div>
          @endforeach
        @endif
        {{-- <div class="netizen">
          <img src="{{ asset('assets/images/people1.png') }}" alt="" class="user-img">
          <div class="text">
               <h3 class="username">
                    Sarah
               </h3>
               <p class="comment">
                    Very Helpfull Information.  
               </p>
          </div>
        </div> --}}
    </div>
</section>