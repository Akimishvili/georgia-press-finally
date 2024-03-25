@extends('layouts.master')
@section('title', __('static.nav.video'))

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
            <h2 class="text-light-blue py-4 text-uppercase" data-language="{{$language}}"> {{ __('static.nav.video') }}</h2>
            <div class="row justify-content-center">
                @foreach($blocks  as  $block)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <x-video-component :block="$block" :language="$language" :article="$block -> article"/>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $blocks->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".categories", categoryItemSlide );
    </script>
@endsection
