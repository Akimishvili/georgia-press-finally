@extends('layouts.dashboard')
@section('title', 'Articles List')
@section('main')
    @session('success')
    <div class="alert alert-success" role="alert"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ $value }}
    </div>
    @endsession
    <div class="row">
        @foreach($articles as $article)
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card admin-article-card" data-view="{{ $article -> view }}">
                    <div class="card-header">
                        <img  class="response-img" src="{{ asset('images/articles/' . $article -> image) }}" />
                    </div>
                    <div class="card-body">
                        <h3 class="card-title truncate" title="{{ $article -> title -> ka }}">
                            {{ $article -> title -> ka }}
                        </h3>
                        <div class="line-clamp">
                            {!! $article -> description -> ka !!}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a type="button" class="btn btn-success d-flex gap-2" href="{{ route('articles.edit', ['language' => app()->getLocale(), 'article' => $article]) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span class="text-label">Edit</span>
                        </a>
                        <form method="POST" action="{{ route('articles.destroy', ['language' => app()->getLocale(),'article' => $article]) }}" onsubmit="return confirm('წავშალოთ სტატია?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-flex gap-2">
                                <i class="bi bi-trash"></i>
                                <span class="text-label">Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! $articles->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection

