@extends('layouts.dashboard')
@section('title', 'სტატიის რედაქტირება/' . $article -> title -> ka)
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
    <div class="container categories border border-2 bg-white p-2 rounded mb-4" data-content="categories">
        <h2 class="mb-3 text-dark-blue">კატეგორიის დამატება</h2>
        @session('error')
        <div class="alert alert-danger" role="alert"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ $value }}
        </div>
        @endsession
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('setArticleCategories', ['language' => app()->getLocale(),'article' =>  $article]) }}">
                    @csrf
                    <div class="row gap-2">
                        @foreach($categories as $category)
                            @if($article->categories->contains($category->id))
                                <div class="btn-group col" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" value="{{ $category -> id }}" id="c_{{ $category -> id }}" autocomplete="off" name="categories[]" disabled>
                                    <label class="btn btn-outline-primary" for="c_{{ $category -> id }}">{{ $category -> title -> ka }}</label>
                                    <a class="btn btn-danger" href="{{ route('deleteArticleCategories',  ['language' => app()->getLocale(),'article' =>  $article, 'category' => $category]) }}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            @else
                                <div class="btn-group col" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" value="{{ $category -> id }}" id="c_{{ $category -> id }}" autocomplete="off" name="categories[]">
                                    <label class="btn btn-outline-primary" for="c_{{ $category -> id }}">{{ $category -> title -> ka }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">სტატიისთვის კატეგორიის მინიჭება</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container  border border-2 bg-primary p-2 rounded mb-4" data-content="docs">
        <h2 class="mb-3 text-dark-blue">დოკუმენტის დამატება</h2>
        <form method="POST"  action="{{ route('docs.store', ['language' => app()->getLocale()]) }}" enctype="multipart/form-data">
            @csrf
            <nav>
                <div class="nav nav-tabs" id="doc-nav-tab" role="tablist">
                    <button class="nav-link active" id="doc-ka-tab" data-bs-toggle="tab" data-bs-target="#doc-ka-tab-content" type="button" role="tab" aria-controls="ka-tab-content" aria-selected="true">KA</button>
                    <button class="nav-link" id="doc-en-tab" data-bs-toggle="tab" data-bs-target="#doc-en-tab-content" type="button" role="tab" aria-controls="en-tab-content" aria-selected="false">EN</button>
                    <button class="nav-link" id="doc-ru-tab" data-bs-toggle="tab" data-bs-target="#doc-ru-tab-content" type="button" role="tab" aria-controls="ru-tab-content" aria-selected="false">RU</button>
                </div>
            </nav>
            <div class="tab-content" id="doc-nav-tabContent">
                <!-- tab ka-->
                <div class="tab-pane fade pt-2 show active" id="doc-ka-tab-content" role="tabpanel" aria-labelledby="doc-ka-tab" tabindex="0">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title_ka" placeholder="სათაური"  required/>
                    </div>
                </div>
                <!-- tab ka-->

                <!-- tab en-->
                <div class="tab-pane pt-2 fade" id="doc-en-tab-content" role="tabpanel" aria-labelledby="doc-en-tab" tabindex="0">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title_en" placeholder="Title"  required/>
                    </div>
                </div>
                <!-- tab en-->

                <!-- tab ru-->
                <div class="tab-pane pt-2 fade" id="doc-ru-tab-content" role="tabpanel" aria-labelledby="doc-ru-tab" tabindex="0">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title_ru" placeholder="заголовок"  required/>
                    </div>
                </div>
                <!-- tab ru-->
            </div>
            <div class="mb-3">
               <input type="file" class="form-control"  name="file" />
            </div>
           <input type="hidden" name="article_id" value="{{ $article -> id }}">
            <div class="col-md-6">
                <button type="submit" class="btn bg-dark-blue text-white">დოკუმენტის დამატება</button>
            </div>
        </form>
    </div>
    <div class="row" data-content="update post">
        <div class="col-md-12">
            <form method="POST"   action="{{ route('articles.update', ['language' => app()->getLocale(),'article' =>  $article]) }}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="title_ka" placeholder="სათაური" value="{{ $article -> title -> ka }}" required/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ka" placeholder="აღწერა" required>{{ $article -> description -> ka }}</textarea>
                        </div>
                    </div>
                    <!-- tab ka-->

                    <!-- tab en-->
                    <div class="tab-pane pt-2 fade" id="en-tab-content" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_en" placeholder="Title" value="{{ $article -> title -> en }}" required/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_en" placeholder="description" required>{{ $article -> description -> en }}</textarea>
                        </div>
                    </div>
                    <!-- tab en-->

                    <!-- tab ru-->
                    <div class="tab-pane pt-2 fade" id="ru-tab-content" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title_ru" placeholder="заголовок" value="{{ $article -> title -> ru }}" required/>
                        </div>
                        <div class="mb-3">
                            <textarea  class="form-control textarea-form-field" rows="5" name="description_ru" placeholder="Описание" required>{{ $article -> description -> ru }}</textarea>
                        </div>
                    </div>
                    <!-- tab ru-->
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control"  name="image" />
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="section_id">
                        <option selected disabled>სექციის დამატება</option>
                        @foreach($sections as $section)
                            <option value="{{ $section -> id }}" @selected($article -> section_id == $section -> id)>{{ $section -> title -> ka}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">განახლება</button>
                    </div>
                    <div class="col-md-6 overflow-hidden">
                        <img src="{{ asset('images/articles/' . $article -> image) }}" class="response-img float-end w-25"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="border border-white p-4 rounded-2 mt-4" >
        @foreach($article -> blocks as $block)
            @if($block -> title)
                <div class="row border border-white p-2 rounded-2 mb-3">
                    <div class="col-sm-10">
                        <h4 class="card-title text-white">{{ $block -> title -> ka }}</h4>
                    </div>
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-primary w-100" href="{{ route('blocks.edit',['language' => app()->getLocale(), 'block' => $block]) }}" >Edit</a>
                    </div>
                </div>
            @elseif($block -> sub_title)
                <div class="row border border-white p-2 rounded-2 mb-3">
                    <div class="col-sm-10">
                        <h4 class="card-title text-white">{{ $block -> sub_title -> ka }}</h4>
                    </div>
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-primary w-100" href="{{ route('blocks.edit',['language' => app()->getLocale(), 'block' => $block]) }}" >Edit</a>
                    </div>
                </div>
            @elseif($block -> description)
                <div class="row border border-white p-2 rounded-2 mb-3">
                    <div class="col-sm-10">
                        <h4 class="card-text line-clamp text-white">{!! $block -> description -> ka !!}</h4>
                    </div>
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-primary w-100" href="{{ route('blocks.edit',['language' => app()->getLocale(), 'block' => $block]) }}">Edit</a>
                    </div>
                </div>
            @elseif($block -> image)
                <div class="row border border-white p-2 rounded-2 mb-3 align-items-center">
                    <div class="col-sm-10">
                        <img class="w-25" src="{{ asset('images/articles/blocks/' . $block -> image) }}" />
                    </div>
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-primary w-100" href="{{ route('blocks.edit',['language' => app()->getLocale(), 'block' => $block]) }}">Edit</a>
                    </div>
                </div>
            @else
                <div class="row border border-white p-2 rounded-2 mb-3">
                    <div class="col-sm-10">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $block -> video }}" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-primary w-100" href="{{ route('blocks.edit',['language' => app()->getLocale(), 'block' => $block]) }}">Edit</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <!-- ✨ TODO: ADD BLOCK SECTION  ✨-->
    <div class="add-block-section border border-white p-4 rounded-2 mt-4" id="add-block-section"></div>
    <!-- ✨ TODO: TEMPLATE CONTENT SECTION  ✨-->
    <template id="add-section-for-template">
        <form method="POST" action="{{ route('blocks.store', ['language' => app()->getLocale()]) }}" enctype="multipart/form-data">
            @csrf
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
                        <input type="text" class="form-control" name="title_ka" placeholder="სათაური" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="sub_title_ka" placeholder="სათაური" />
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control textarea-form-field" rows="5" name="description_ka" placeholder="აღწერა" ></textarea>
                    </div>
                </div>
                <!-- tab ka-->

                <!-- tab en-->
                <div class="tab-pane pt-2 fade" id="en-tab-content-block" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title_en" placeholder="Title" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="sub_title_en" placeholder="Title"/>
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control textarea-form-field" rows="5" name="description_en" placeholder="description" ></textarea>
                    </div>
                </div>
                <!-- tab en-->

                <!-- tab ru-->
                <div class="tab-pane pt-2 fade" id="ru-tab-content-block" role="tabpanel" aria-labelledby="ru-tab" tabindex="0">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title_ru" placeholder="заголовок"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="sub_title_ru" placeholder="заголовок" />
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control textarea-form-field" rows="5" name="description_ru" placeholder="Описание" ></textarea>
                    </div>
                </div>
                <!-- tab ru-->
            </div>
            <div class="mb-3">
                <input type="file" class="form-control"  name="image" />
            </div>
            <div class="mb-3">
                <input type="url" class="form-control"  name="video" placeholder="ვიდეო (EMBED URL)"/>
            </div>
            <input type="hidden" name="article_id" value="{{ $article -> id }}" />

            <button type="submit" class="btn btn-primary">ბლოკის დამატება</button>
        </form>
    </template>
    <!--TODO: POSITION FIXED ELEMENT -->
    <button type="button" class="btn btn-primary" id="add-section-btn" title="სტატიისთვის სექციის დამატება" onclick="addArticleSection(this)">
        <i class="bi bi-plus-circle"></i>
        <span>სექციის დამატება</span>
    </button>
    <button type="button" class="btn btn-danger" disabled id="delete-section-btn" title="სტატიისთვის სექციის წაშლა" onclick="deleteArticleSection(this)">
        <i class="bi bi-trash3"></i>
        <span>სექციის წაშლა</span>
    </button>
@endsection
@section('scripts')
    <script>

        function addArticleSection(e) {
            const addSectionForTemplate = document.getElementById('add-section-for-template')
            const addBlockSection = document.getElementById('add-block-section')
            const deleteSectionBtn = document.getElementById('delete-section-btn')
            addBlockSection.appendChild(addSectionForTemplate.content.cloneNode(true))
            e.setAttribute('disabled', 'disabled')
            deleteSectionBtn.removeAttribute('disabled')
        }

        function deleteArticleSection(e){
            const addBlockSection = document.getElementById('add-block-section')
            const addSectionBtn = document.getElementById('add-section-btn')
            addBlockSection.children[0].remove()
            e.setAttribute('disabled', 'disabled')
            addSectionBtn.removeAttribute('disabled')
        }
        tinymce.init({
            selector: '.textarea-form-field', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        });
    </script>
@endsection

