<div class="card card-block my-4">
    @if($block -> image)
        <div class="card-header p-0 overflow-hidden ">
            <a href="{{ asset('images/articles/' . $block -> image ) }}" data-fancybox="gallery" data-caption="Block graphic resource">
                <img src="{{ asset('images/articles/' . $block -> image ) }}" class="img-fluid response-img rounded-start zoom-image" alt="...">
            </a>
    </div>
    @endif
    <div class="card-body card-block-body">
        @if($block -> title)
            <h3 class="card-block-title">{{$block -> title -> $language}}</h3>
        @endif
        @if($block -> sub_title)
             <h4 class="card-block-subtitle">{{$block -> sub_title -> $language}}</h4>
        @endif
        @if($block -> description)
              <p class="card-block-description">
                {{ $block -> description -> $language }}
              </p>
        @endif
    </div>
     @if($block -> video)
            <div class="card-footer card-block-footer p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $block -> video }}" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
     @endif
</div>
