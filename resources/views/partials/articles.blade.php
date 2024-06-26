<div class="container-fluid {{$mt}}">
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-4 col-md-6 mb-4">
                    <x-article-component :article="$article" :language="$language"/>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $articles->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
