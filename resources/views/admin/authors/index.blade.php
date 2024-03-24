@extends('layouts.dashboard')
@section('title', 'Authors List')
@section('main')
    @session('success')
    <div class="alert alert-success" role="alert"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ $value }}
    </div>
    @endsession
    <div class="row">
        @foreach($authors as $author)
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card">
                    @if($author -> image)
                        <div class="card-header">
                            <img  class="response-img" src="{{ asset('images/authors/' . $author -> image) }}" />
                        </div>
                    @endif
                    <div class="card-body">
                        <h3 class="card-title truncate" title="{{ $author->first_name->ka }} {{ $author->last_name->ka }}">
                            {{ $author->first_name->ka }} {{ $author->last_name->ka}}
                        </h3>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a type="button" class="btn btn-success d-flex gap-2" href="{{ route('authors.edit', ['language' => app()->getLocale(),'author' => $author]) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span class="text-label">Edit</span>
                        </a>
                        <form method="POST" action="{{ route('authors.destroy', [ 'language' => app()->getLocale(), 'author' => $author]) }}" onsubmit="return confirm('წავშალოთ ავტორი?')">
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
            {!! $authors->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection

