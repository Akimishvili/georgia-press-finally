@if( count($green) )
    <div class="container-fluid pt-4">
        <div class="container">
            <h2 class="fw-bold text-dark-blue fs-3" data-language="{{$language}}">{{ $greenCategory -> title -> $language }}</h2>
            <div class="swiper categories">
                <div class="swiper-wrapper">
                    @foreach( $green as $item )
                        <div class="swiper-slide">
                            <a class="d-block text-decoration-none" href="{{ route('articles.show', ['language' => app() -> getLocale(),'article' => $item]) }}">
                                <x-category-item-component :item="$item" :language="$language" />
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
@endif
