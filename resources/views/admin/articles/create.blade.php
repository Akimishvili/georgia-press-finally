@extends('layouts.dashboard')
@section('title', 'სტატიის შექმნა')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />
@endsection
@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form method="POST"   action="{{ route('articles.store', ['language' => app()->getLocale()]) }}" enctype="multipart/form-data">
                @csrf
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
                            <input type="text" class="form-control" name="title_ka" placeholder="სათაური" required/>
                            @error('title_ka')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field bg-white" rows="5" name="description_ka" placeholder="აღწერა"></textarea>
                            @error('description_ka')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- tab ka-->

                    <!-- tab en-->
                    <div class="tab-pane pt-2 fade" id="en-tab-content" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_en" placeholder="Title" required/>
                            @error('title_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field bg-white" rows="5" name="description_en" placeholder="description"></textarea>
                            @error('description_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- tab en-->

                    <!-- tab ru-->
                    <div class="tab-pane pt-2 fade" id="ru-tab-content" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_ru" placeholder="заголовок" required/>
                            @error('title_ru')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ru" placeholder="Описание"></textarea>
                            @error('description_ru')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- tab ru-->
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control"  name="image" required/>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="visibility">
                        <option selected disabled>სტატიის გამოჩენა/დამალვა</option>
                        <option value="1">გამოჩენა</option>
                        <option value="0">დამალვა</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="date" placeholder="თარიღი"/>
                </div>
                <button type="submit" class="btn btn-primary">დამატება</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script src="https://cdn.tiny.cloud/1/yu4ov2g7qn4hup219i0ahf4wzwcsvtkns120joev89fik6t2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.textarea-form-field',
        valid_elements: 'p,strong,em,br',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endsection

