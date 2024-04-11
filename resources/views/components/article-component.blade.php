<div class="card article-card">
        <div class="card-header p-1 bg-transparent position-relative article-card-header">
            <img src="{{ asset('images/articles/' . $article -> image) }}" class="card-img-top response-img" alt="...">
            <div class="article-categories">
                @foreach($article -> categories as $category)
                    <div class="btn-group category-group" role="group" aria-label="button group">
                        <a type="button" class="btn d-block category-btn" href="{{ route('category.page', ['language' => app() -> getLocale(), 'category' => $category]) }}" data-language="{{$language}}">
                            <span class="button-label text-uppercase category-name-label">{{$category -> title -> $language}}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-body">
            <a class="d-block text-decoration-none" href="{{ route('articles.show',['language' => app() -> getLocale(),'article' => $article]) }}">
                <h5 class="article-card-title truncate fs-4 text-black" data-language="{{$language}}">{{ $article -> title -> $language }}</h5>
            </a>
            <p class="card-text line-clamp" data-language="{{$language}}">{!!  Str::substr( strip_tags($article -> description -> $language), 0, 150) !!}</p>
            <a href="{{ route('articles.show',['language' => app() -> getLocale(),'article' => $article]) }}" class="btn bg-light-blue text-white more float-end mt-2" data-language="{{$language}}">{{__('static.page.more')}}</a>
        </div>
</div>

