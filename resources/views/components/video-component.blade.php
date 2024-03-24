<div class="card">
    <div class="card-header p-0">
        <div class="ratio ratio-16x9">
            <iframe src="{{ $block -> video }}" title="YouTube video" allowfullscreen></iframe>
        </div>
    </div>
    <div class="card-body ">
        <h4 class="truncate">{{ $videoTitle -> $language}}</h4>
    </div>
</div>
