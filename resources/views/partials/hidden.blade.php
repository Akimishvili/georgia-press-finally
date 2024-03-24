<aside class="aside-navbar bg-dark-blue aside-navbar-hide d-block d-xxl-none" id="aside-navbar">
    <button class="btn py-1 px-2" id="aside-navbar-toggle">
        <i class="bi bi-list fs-5"></i>
        <i class="bi bi-x-lg fs-5"></i>
    </button>
    <ul class="list-group list-group-flush">
        <li class="nav-item">
            <a class="nav-link  nav-category  position-relative animated-line text-uppercase d-block px-5 py-2" href="{{ route('home.page',['language' => app() -> getLocale()]) }}">{{ __('static.nav.home') }}</a>
        </li>
        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link  nav-category position-relative animated-line text-uppercase text-focus d-block px-5 py-2" href="{{  route('category.page',['language' => app() -> getLocale(), 'category' => $category->id]) }}">{{ $category -> title -> $language }}</a>
            </li>
        @endforeach
        <li class="nav-item">
            <div class="dropdown position-relative">
                <button class="btn  dropdown-toggle dropdown-toggle-side px-5 py-2 text-start text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('static.nav.media') }}
                </button>
                <ul class="dropdown-menu position-relative dropdown-menu-side bg-transparent border border-0 py-0">
                    @foreach( $sections as $section)
                        @if( in_array($language, $section -> languages))
                            <li>
                                <a class="nav-link  nav-category position-relative animated-line text-uppercase text-focus d-block px-5 py-2" href="{{ route('section.page', ['language' => app()->getLocale(), 'section' => $section->id]) }}">
                                    {{ $section->title->$language }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link nav-category position-relative animated-line text-uppercase d-block px-5 py-2" href="{{ route('video.page', ['language' => app() -> getLocale()]) }}">{{ __('static.nav.video') }}</a>
        </li>
    </ul>
</aside>
