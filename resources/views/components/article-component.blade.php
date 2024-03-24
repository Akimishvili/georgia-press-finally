<div class="card article-card">
    <div class="card-header p-1 bg-transparent position-relative article-card-header">
        <img src="{{ asset('images/articles/' . $article -> image) }}" class="card-img-top response-img" alt="...">
        <div class="article-categories">
            @foreach($article -> categories as $category)
                <div class="btn-group category-group" role="group" aria-label="button group">
                    <button type="button" class="btn bg-dark-blue text-light-blue">
                        <i class="bi bi-tag"></i>
                    </button>
                    <a type="button" class="btn d-block bg-dark-blue text-light-blue category-btn" href="{{ route('category.page', ['language' => app() -> getLocale(), 'category' => $category]) }}">
                        <span class="button-label text-uppercase">{{$category -> title -> $language}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title truncate fs-4">{{ $article -> title -> $language }}</h5>
        <div class="card-text line-clamp">{!!  $article -> description -> $language !!}</div>
        <a href="{{ route('articles.show',['language' => app() -> getLocale(),'article' => $article]) }}" class="btn bg-dark-blue text-light-blue more float-end" >{{__('static.page.more')}}</a>
    </div>
</div>
