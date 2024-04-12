<div class="card mb-3">
    <div class="row g-0">
        <div class="col-sm-4">
            <img src="{{  $item -> image  }}" class="rounded-start category-item-image response-img" alt="...">
        </div>
        <div class="col-sm-8">
            <div class="card-body">
                <h5 class="card-title truncate" data-language="{{$language}}">{{ $item -> title -> $language }}</h5>
                <div class="card-text line-clamp" data-language="{{$language}}">{!! $item -> description -> $language !!}</div>
            </div>
        </div>
    </div>
</div>
