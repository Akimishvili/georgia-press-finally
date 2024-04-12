@extends('layouts.master')
@section('title', '404 - Page Not Found')

@section('styles')

@endsection

@section('main')
<section class="not-found">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <a class="d-block" href="{{ route('home.page') }}">
                    <img class="d-block w-100" src="{{ asset('images/themes/404-error.jpg')}}" alt="404 not found" />
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    setTimeout(() => window.location.href = "/",5000)
</script>
@endsection
