@extends('layouts.master')
@section('meta')
    @include('partials.share-meta')
@endsection
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
                    <main class="main border py-4  px-0 px-md-4 rounded">
                        <div class="container px-0">
                            <x-view-more-component :article="$article" :language="$language" :author="$author"/>
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
                    <div class="btn-group my-4 justify-content-end float-end" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-primary bg-dark-blue text-white" data-sharer="facebook"  data-url="{{ url() -> current() }}" data-title="{{ $article -> title -> $language }}"><i class="bi bi-facebook "></i></button>
                        <button type="button" class="btn btn-outline-primary bg-dark-blue text-white" data-sharer="telegram"  data-url="{{ url() -> current() }}" data-title="{{ $article -> title -> $language }}"><i class="bi bi-telegram"></i></button>
                        <button type="button" class="btn btn-outline-primary bg-dark-blue text-white" data-sharer="twitter"  data-url="{{ url() -> current() }}" data-title="{{ $article -> title -> $language }}"><i class="bi bi-twitter-x"></i></button>
                    </div>
                </div>
                <div class="col-md-4 assist pb-4">
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
    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
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
