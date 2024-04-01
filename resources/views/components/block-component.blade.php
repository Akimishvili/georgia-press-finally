<div class="card card-block my-4">
    @if($block -> image)
        <div class="card-header p-0 overflow-hidden ">
            <a href="{{ asset('images/articles/blocks/' . $block -> image ) }}" data-fancybox="gallery" data-caption="Block graphic resource">
                <img src="{{ asset('images/articles/blocks/' . $block -> image ) }}" class="img-fluid response-img rounded-start zoom-image" alt="...">
            </a>
    </div>
    @endif
    <div class="card-body card-block-body" data-content="{{$content}}">
        @if($block -> title)
            <h3 class="card-block-title" data-language="{{$language}}">{{$block -> title -> $language}}</h3>
        @endif
        @if($block -> sub_title)
             <h4 class="card-block-subtitle" data-language="{{$language}}">{{$block -> sub_title -> $language}}</h4>
        @endif
        @if($block -> description)
              <div class="card-block-description" data-language="{{$language}}">
                {!! $block -> description -> $language !!}
              </div>
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
