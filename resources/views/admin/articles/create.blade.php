@extends('layouts.dashboard')
@section('title', 'სტატიის შექმნა')
@section('main')
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
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ka" placeholder="აღწერა" required></textarea>
                        </div>
                    </div>
                    <!-- tab ka-->

                    <!-- tab en-->
                    <div class="tab-pane pt-2 fade" id="en-tab-content" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_en" placeholder="Title" required/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_en" placeholder="description" required></textarea>
                        </div>
                    </div>
                    <!-- tab en-->

                    <!-- tab ru-->
                    <div class="tab-pane pt-2 fade" id="ru-tab-content" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_ru" placeholder="заголовок" required/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ru" placeholder="Описание" required></textarea>
                        </div>
                    </div>
                    <!-- tab ru-->
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control"  name="image" required/>
                </div>
                <button type="submit" class="btn btn-primary">დამატება</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        tinymce.init({
            selector: '.textarea-form-field', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection

