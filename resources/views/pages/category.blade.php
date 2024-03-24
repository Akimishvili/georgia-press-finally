@extends('layouts.master')
@section('title', __('static.page.category') .' / ' . $category -> title -> $language)

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
            <h2 class="text-light-blue py-4 text-uppercase">{{ __('static.page.category') }} / {{ $category -> title -> $language }}</h2>
                <div class="row">
                    @forelse($category -> articles as $article)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <x-article-component :article="$article" :language="$language"/>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-primary fs-4 text-dark-blue" role="alert">
                                🧐 {{ __('static.page.notFound') }}
                            </div>
                        </div>
                    @endforelse
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".categories", categoryItemSlide );
    </script>
@endsection
