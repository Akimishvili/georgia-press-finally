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
        <h3 class="text-light-blue text-uppercase">
            {{ __('static.page.all_articles') }} / {{ join(' ', [$author -> first_name -> $language, $author -> last_name -> $language])}}
        </h3>
    </div>
    @include('partials.articles',  ['mt' => 'mt-3'])
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".categories", categoryItemSlide);
    </script>
@endsection
