@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('main')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card bg-light-blue">
                <div class="card-header  d-flex justify-content-between">
                    <button class="btn  px-2 bg-dark-blue text-white py-1">
                        <i class="bi bi-newspaper"></i>
                    </button>
                    <button class="btn bg-dark-blue text-white px-2 py-1">
                        <span class="btn-label">{{ $articles -> title }}</span>
                    </button>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <button class="btn bg-dark-blue text-white px-2 py-1">
                        <span class="btn-label">რაოდენობა</span>
                    </button>
                    <button class="btn bg-dark-blue text-white px-2 py-1">{{ $articles -> count }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
