<div class="card">
    <div class="card-header overflow-hidden p-0">
        <a href="{{ route('articles.show', ['language' => app() -> getLocale(), 'article' => $article]) }}" class="assist-link">
            <img src="{{  $article -> image  }}" class="card-img-top response-img  zoom-image" alt="...">
        </a>
    </div>
    <div class="card-body">
        <p class="card-text truncate" data-language="{{$language}}">{{ $article -> title -> $language }}</p>
    </div>
</div>
