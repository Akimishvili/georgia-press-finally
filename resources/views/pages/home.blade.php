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
    @include('partials.articles')
    @include('partials.sport-category')
    @include('partials.social-category')
    @include('partials.economy-category')
    @include('partials.green-category')
    @include('partials.animal-category')
    @include('partials.tourism-category')
    @include('partials.youth-category')
    @include('partials.culture-category')
    @include('partials.video-category')
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".categories", categoryItemSlide);
    </script>
@endsection
