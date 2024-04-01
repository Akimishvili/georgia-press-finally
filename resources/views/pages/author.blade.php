@extends('layouts.master')
@section('title', __('static.page.home.title'))

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
    <div class="container mt-3">
        <h3 class="text-light-blue text-uppercase fs-4">
            <span >
                  {{ __('static.page.all_articles') }} /
            </span>
            <span class="fw-bold">
                {{ join(' ', [$author -> first_name -> $language, $author -> last_name -> $language])}}
            </span>
        </h3>
    </div>
    @include('partials.articles',  ['mt' => 'mt-3'])
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".categories", categoryItemSlide);
    </script>
@endsection
