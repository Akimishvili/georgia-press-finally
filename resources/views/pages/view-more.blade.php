@extends('layouts.master')
@section('title', $article -> title -> $language)

@section('styles')
    <style>
        .partners {
            padding-block: 15px;
        }
        .swiper-pagination {
            --swiper-pagination-bottom: -5px;
        }
    </style>
@endsection

@section('main')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7 mb-4">
                    <main class="main border p-4 rounded">
                        <div class="container">
                            <x-view-more-component :article="$article" :language="$language" />
                            @foreach($article -> blocks as $block)
                                <x-block-component :block="$block" :language="$language" />
                            @endforeach
                        </div>
                        @foreach($article -> docs as $doc)
                            <div class="container doc-container p-4 border rounded" data-content="document-container">
                                <div class="row align-items-center mb-3">
                                    <div class="col-10">
                                        <h2 data-language="{{$language}}">{{ $doc -> title -> $language }}</h2>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end">
                                        <a class="d-block" target="_blank" href="{{ asset('docs/article_' . $article -> id .'/' .$doc -> url) }}">
                                            <i class="bi bi-arrows-fullscreen"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ asset('docs/article_' . $article -> id .'/' .$doc -> url) }}" title="YouTube video" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endforeach
                    </main>
                </div>
                <div class="col-md-4 assist">
                    <h4 class="p-4" data-language="{{$language}}">{{ __('static.section.assist.title') }}</h4>
                    <div class="assist d-flex flex-column gap-4">
                        @foreach($lasts as $article)
                            <div class="col">
                                    <x-assist-component :article="$article" :language="$language" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const photoGalleryBreakPoints =  {
            400: {
                slidesPerView: 2
            },
            600: {
                slidesPerView: 3
            },
           900: {
               slidesPerView: 4
           },
            1200: {
                slidesPerView: 5
            },
            1400: {
                slidesPerView: 6
            }
        }
        // slidesPerView: 2
        const photoGalleryViews = 2
        const photoGallerySlider = new Swiper(".photo-gallery-slider", {...categoryItemSlide, breakpoints: photoGalleryBreakPoints, slidesPerView: photoGalleryViews} );

        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection
