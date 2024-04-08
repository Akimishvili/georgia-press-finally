<div class="card mb-3 view-more-card">
    <h2 class="card-title p-3 fw-bolder view-more-card-title" data-language="{{$language}}">{{ $article -> title -> $language }}</h2>
    <div class="card-header p-0 overflow-hidden ">
        <a href="{{ asset('images/articles/' . $article -> image ) }}" data-fancybox="gallery" data-caption="{{ $article -> title -> $language }}">
            <img src="{{ asset('images/articles/' . $article -> image ) }}" class="img-fluid response-img zoom-image" alt="{{ $article -> title -> $language }}">
        </a>
    </div>
    <div class="row align-items-center p-3">
        @if($author)
            <div class="col-6">
                <div class="row align-items-center gap-2">
                    <div class="col pe-0">
                        <a class="d-block" href="{{ route('author.page', ['language' => app() -> getLocale(), 'author' => $author])  }}">
                            <img class="rounded-circle author-avatar mb-2" src="{{ $author -> image ? asset('images/authors/' . $author -> image) : asset('images/authors/author-avatar.png') }}"  alt="author avatar icon"/>
                        </a>
                    </div>
                    <div class="col px-0" style="flex-grow: 4">
                        <a class="d-flex flex-column pb-2 text-decoration-none" href="{{ route('author.page', ['language' => app() -> getLocale(), 'author' => $author]) }}">
                            <span class="fs-6 text-dark-blue">{{ join(' ', [$author -> first_name -> $language, $author -> last_name -> $language])}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex gap-2 justify-content-end">
                <i class="bi bi-calendar3"></i>
                <span>{{ $article -> created_at }}</span>
            </div>
        @else
            <div class="col-12 d-flex gap-2 py-2 justify-content-end">
                <i class="bi bi-calendar3"></i>
                <span>{{ $article -> date }}</span>
            </div>
        @endif
    </div>
    <div class="card-body border border-0">
        <div class="card-text" data-language="{{$language}}">{!! $article -> description -> $language !!}</div>
    </div>
</div>



{{--@if( count($article -> images) )--}}
{{--<div class="container px-0">--}}
{{--    <h3 class="card-title truncate mb-4">Photo Gallery</h3>--}}
{{--    <div class="swiper photo-gallery-slider">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            @foreach( $article -> images as $image )--}}
{{--                <div class="swiper-slide">- -}}
{{--                    <a href="{{ asset('images/galleries/' . $image -> url) }}" data-fancybox="gallery" data-caption="{{ $article -> title -> $language }}">--}}
{{--                        <img class="response-img img-thumbnail" src="{{ asset('images/galleries/' . $image -> url) }}" />--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="swiper-pagination"></div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endif--}}
