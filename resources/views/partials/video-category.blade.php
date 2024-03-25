<div class="container-fluid pt-4 pb-4">
        <div class="container">
            <h2 class="fw-bold text-dark-blue" data-language="{{$language}}">{{ __('static.nav.video') }}</h2>
            <div class="swiper categories pb-4">
                <div class="swiper-wrapper">
                    @foreach( $blocks as $block )
                        <div class="swiper-slide">
                            <x-video-component :block="$block" :language="$language" :article="$block -> article"/>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
</div>
