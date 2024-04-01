<div class="card mb-3">
    <div class="card-header p-0 overflow-hidden ">
        <a href="{{ asset('images/articles/' . $article -> image ) }}" data-fancybox="gallery" data-caption="{{ $article -> title -> $language }}">
            <img src="{{ asset('images/articles/' . $article -> image ) }}" class="img-fluid response-img rounded-start zoom-image" alt="...">
        </a>
    </div>
    <div class="card-body">
        <h2 class="card-title" data-language="{{$language}}">{{ $article -> title -> $language }}</h2>
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
