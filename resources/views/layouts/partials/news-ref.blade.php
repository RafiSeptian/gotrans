<div class="news-ref">
     <form action="{{ route('news.query') }}" method="GET">
          <div class="form-search">
               <input type="text" name="q" id="search" placeholder="Cari...">
               <i class="fas fa-search"></i>
          </div>
     </form>
     <h3 class="sub-heading">Berita Lainnya</h3>
     <ul class="ref-ul">
          @foreach (\App\News::OrderBy('created_at', 'desc')->limit(5)->get() as $news)
               <li class="ref-item">
                    <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
               </li>
          @endforeach
          {{-- <li class="ref-item">
               <a href="#">Lorem Ipsum</a>
          </li>
          <li class="ref-item">
               <a href="#">Lorem Ipsum</a>
          </li>
          <li class="ref-item">
               <a href="#">Lorem Ipsum</a>
          </li>
          <li class="ref-item">
               <a href="#">Lorem Ipsum</a>
          </li> --}}
     </ul>

     {{-- <h3 class="sub-heading">Arsip</h3>
     <ul class="ref-ul">
          <li class="ref-item">
               <a href="#">September 2017</a>
          </li>
          <li class="ref-item">
               <a href="#">Oktober 2017</a>
          </li>
          <li class="ref-item">
               <a href="#">Desember 2017</a>
          </li>
     </ul> --}}

     <h3 class="sub-heading">Kategori</h3>
     <ul class="ref-ul">
          @foreach (\App\Category::all() as $category)
               <li class="ref-item">
                    <a href="{{ route('category.show', $category->name) }}">{{ ucfirst($category->name) }}</a>
               </li>
          @endforeach
     </ul>
</div>