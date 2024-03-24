@extends('layouts.dashboard')
@section('title', 'ავტორის განახლება')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <form method="POST"  action="{{ route('authors.update', ['language' => app()->getLocale(), 'author' => $author])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="ka-tab" data-bs-toggle="tab" data-bs-target="#ka-tab-content" type="button" role="tab" aria-controls="ka-tab-content" aria-selected="true">KA</button>
                        <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-content" type="button" role="tab" aria-controls="en-tab-content" aria-selected="false">EN</button>
                        <button class="nav-link" id="ru-tab" data-bs-toggle="tab" data-bs-target="#ru-tab-content" type="button" role="tab" aria-controls="ru-tab-content" aria-selected="false">RU</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!-- tab ka-->
                    <div class="tab-pane fade pt-2 show active" id="ka-tab-content" role="tabpanel" aria-labelledby="ka-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name_ka" placeholder="სახელი" value="{{ $author -> first_name -> ka }}" required/>
                        </div>
                        <div class="mb-3">
                            <input  class="form-control" name="last_name_ka" placeholder="გვარი" value="{{ $author -> last_name -> ka }}" required />
                        </div>
                    </div>
                    <!-- tab ka-->

                    <!-- tab en-->
                    <div class="tab-pane pt-2 fade" id="en-tab-content" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name_en" placeholder="First Name" value="{{ $author -> first_name -> en }}" required/>
                        </div>
                        <div class="mb-3">
                            <input  class="form-control" name="last_name_en" placeholder="Last Name" value="{{ $author -> last_name -> en }}" required />
                        </div>
                    </div>
                    <!-- tab en-->

                    <!-- tab ru-->
                    <div class="tab-pane pt-2 fade" id="ru-tab-content" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name_ru" placeholder="имя" value="{{ $author -> first_name -> ru }}" required/>
                        </div>
                        <div class="mb-3">
                            <input  class="form-control" name="last_name_ru" placeholder="фамилия"  value="{{ $author -> last_name -> ru }}" required />
                        </div>
                    </div>
                    <!-- tab ru-->
                </div>
                <div class="mb-3">
                    @if($author -> image)
                        <div class="row">
                            <div class="col-md-8">
                                <input type="file" class="form-control"  name="image" />
                            </div>
                            <div class="col-md-4">
                                <a href="{{ asset('images/authors/' . $author -> image ) }}" data-fancybox="gallery" data-caption="Single image">
                                    <img src="{{ asset('images/authors/' . $author -> image ) }}" class="w-25 float-end"/>
                                </a>
                            </div>
                        </div>
                    @else
                        <input type="file" class="form-control"  name="image" />
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">განახლება</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            // Your custom options for a specific gallery
        });
    </script>
@endsection

