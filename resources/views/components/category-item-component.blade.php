<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('images/articles/' . $item -> image ) }}" class="img-fluid rounded-start category-item-image" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title truncate">{{ $item -> title -> $language }}</h5>
                <div class="card-text line-clamp">{!! $item -> description -> $language !!}</div>
            </div>
        </div>
    </div>
</div>
