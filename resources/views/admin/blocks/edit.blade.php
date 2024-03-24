@extends('layouts.dashboard')
@section('title', 'სტატიის რედაქტირება')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />
@endsection
@section('main')
    @session('success')
    <div class="alert alert-success" role="alert"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ $value }}
    </div>
    @endsession
    @session('warning')
    <div class="alert alert-warning" role="alert"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ $value }}
    </div>
    @endsession
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('blocks.update', ['language' => app() -> getLocale(),'block' => $block]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="ka-tab" data-bs-toggle="tab" data-bs-target="#ka-tab-content-block" type="button" role="tab" aria-controls="ka-tab-content" aria-selected="true">KA</button>
                        <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-content-block" type="button" role="tab" aria-controls="en-tab-content" aria-selected="false">EN</button>
                        <button class="nav-link" id="ru-tab" data-bs-toggle="tab" data-bs-target="#ru-tab-content-block" type="button" role="tab" aria-controls="ru-tab-content" aria-selected="false">RU</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!-- tab ka-->
                    <div class="tab-pane fade pt-2 show active" id="ka-tab-content-block" role="tabpanel" aria-labelledby="ka-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_ka" placeholder="სათაური" @if($block -> title) value="{{$block -> title -> ka}}" @endif />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="sub_title_ka" placeholder="ქვესათაური" @if($block -> sub_title ) value="{{$block -> sub_title -> ka}}" @endif/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ka" placeholder="აღწერა">@if($block -> description ) {{$block -> description -> ka}} @endif</textarea>
                        </div>
                    </div>
                    <!-- tab ka-->

                    <!-- tab en-->
                    <div class="tab-pane pt-2 fade" id="en-tab-content-block" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_en" placeholder="Title"  @if($block -> title) value="{{$block -> title -> en}}" @endif />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="sub_title_en" placeholder="Title"  @if($block -> sub_title ) value="{{$block -> sub_title -> en}}" @endif/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_en" placeholder="description">@if($block -> description ) {{$block -> description -> en}} @endif</textarea>
                        </div>
                    </div>
                    <!-- tab en-->

                    <!-- tab ru-->
                    <div class="tab-pane pt-2 fade" id="ru-tab-content-block" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_ru" placeholder="заголовок"  @if($block -> title) value="{{$block -> title -> ru}}" @endif/>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="sub_title_ru" placeholder="заголовок"  @if($block -> sub_title ) value="{{$block -> sub_title -> ru}}" @endif/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ru" placeholder="Описание">@if($block -> description ) {{$block -> description -> ru}} @endif</textarea>
                        </div>
                    </div>
                    <!-- tab ru-->
                </div>
                <div class="mb-3">
                    @if($block -> image)
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <input type="file" class="form-control"  name="image" />
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/articles/blocks/' . $block -> image) }}" class="w-50">
                            </div>
                        </div>
                    @else
                        <input type="file" class="form-control"  name="image" />
                    @endif
                </div>
                <div class="mb-3">
                    @if($block -> video)
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <input type="url" class="form-control"  name="video" placeholder="ვიდეო (EMBED URL)" value="{{ $block -> video }}"/>
                            </div>
                            <div class="col-md-2">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $block -> video }}" title="YouTube video" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    @else
                        <input type="url" class="form-control"  name="video" placeholder="ვიდეო (EMBED URL)"/>
                    @endif
                </div>
                <input type="hidden" name="article_id" value="{{ $block -> article_id }}" />
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">ბლოკის განახლება</button>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <form method="POST" action="{{ route('blocks.destroy', ['language' => app() -> getLocale() ,'block' => $block]) }}" onsubmit="return confirm('წავშალოთ ბლოკი?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger d-flex gap-2 float-end">
                        <i class="bi bi-trash"></i>
                        <span class="text-label">ბლოკის წაშლა</span>
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>

        $('.textarea-form-field').summernote({
            placeholder: 'Hello Bootstrap 5',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection





