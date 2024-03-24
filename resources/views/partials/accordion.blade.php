<div class="accordion" id="dashboard">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button d-flex gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#articles" aria-expanded="true" aria-controls="articles">
                <i class="bi bi-newspaper"></i>
                <span class="btn-label">სტატიები</span>
            </button>
        </h2>
        <div id="articles" class="accordion-collapse collapse @if($routeName == 'articles.index' || $routeName == 'articles.create' || $routeName == 'articles.edit') show @endif" data-bs-parent="#dashboard">
            <div class="accordion-body">
                <ul class="list-group">
                    <li class="list-group-item  bg-dark-blue  text-white">
                        <a class="nav-link text-light-blue" href="{{ route('articles.index',['language' => app() -> getLocale()])}}">სტატიების ნახვა</a>
                    </li>
                    <li class="list-group-item bg-dark-blue  text-white ">
                        <a class="nav-link" href="{{ route('articles.create', ['language' => app() -> getLocale()])}}">სტატიის შექმნა</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button d-flex gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#author" aria-expanded="true" aria-controls="author">
                <i class="bi bi-person"></i>
                <span class="btn-label">ავტორები</span>
            </button>
        </h2>
        <div id="author" class="accordion-collapse collapse @if($routeName == 'authors.index' || $routeName == 'authors.create' || $routeName == 'authors.edit') show @endif" data-bs-parent="#dashboard">
            <div class="accordion-body">
                <ul class="list-group">
                    <li class="list-group-item  bg-dark-blue  text-white ">
                        <a class="nav-link text-light-blue" href="{{ route('authors.index', ['language' => app() -> getLocale()]) }}">ავტორების ნახვა</a>
                    </li>
                    <li class="list-group-item bg-dark-blue  text-white ">
                        <a class="nav-link" href="{{ route('authors.create', ['language' => app() -> getLocale()]) }}">ავტორის შექმნა</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
