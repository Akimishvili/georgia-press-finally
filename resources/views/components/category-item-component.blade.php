<div class="card mb-3">
    <div class="row g-0">
        <div class="col-sm-4">
            <img src="{{  $item -> image  }}" class="rounded-start category-item-image response-img" alt="...">
        </div>
        <div class="col-sm-8">
            <div class="card-body">
                <h5 class="card-title truncate" data-language="{{$language}}">{{ $item -> title -> $language }}</h5>
                <p class="card-text line-clamp" data-language="{{$language}}">{!!  Str::substr( strip_tags($item -> description -> $language), 0, 150) !!}</p>
            </div>
        </div>
    </div>
</div>
