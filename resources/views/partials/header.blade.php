<div class="container-fluid bg-dark-blue py-4 py-lg-0 position-relative" data-content="navigation">
    <div class="small-device-logo d-block d-lg-none">
        <a class="d-block" href="{{ route('home.page', ['language' => app() -> getLocale()])}}">
            <img src="{{ asset('images/themes/geo-press_400x200.jpg')}}" class="logo d-block"/>
        </a>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 d-lg-flex d-none justify-content-center">
                <a class="d-block" href="{{ route('home.page', ['language' => app() -> getLocale()])}}">
                    <img src="{{ asset('images/themes/geo-press.jpg')}}" class="logo d-block"/>
                </a>
            </div>
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="geo-press-slogan px-md-0 px-3">ჯეორჯიაპრეს</h2>
                    </div>
                    <div class="col">
                        <form class="d-flex" role="search" action="{{ route('home.page', ['language' => app()->getLocale()])}}">
                             <input class="form-control search-bar w-100 px-2" type="search" placeholder="Search" aria-label="Search" name="search">
                             <button class="btn search-bar-icon" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                         <ul class="list-group language-group">
                             <li class="list-group-item language-item @if(  app() -> getLocale() == "ka") d-none @endif">
                                 <a class="list-group-link  dropdown-item-language d-flex gap-2 align-items-center" href="{{ Str::replaceFirst( app()->getLocale(), 'ka', request()->url() ) }}">
                                     <span class="language-label">
                                         <img src="{{ asset('images/flags/flag-ka.png')}}" class="response-img lang" alt="ka"/>
                                     </span>
                                     <span class="language-label text-uppercase">
                                         KA
                                     </span>
                                 </a>
                             </li>
                             <li class="list-group-item language-item @if(  app() -> getLocale() == "en") d-none @endif">
                                 <a class="list-group-link  dropdown-item-language d-flex gap-2 align-items-center" href="{{ Str::replaceFirst( app()->getLocale(), 'en', request()->url() ) }}">
                                     <span class="language-label">
                                         <img src="{{ asset('images/flags/flag-en.png')}}" class="response-img lang" alt="en"/>
                                     </span>
                                     <span class="language-label text-uppercase">
                                         EN
                                     </span>
                                 </a>
                            </li>
                             <li class="list-group-item language-item @if(  app() -> getLocale() == "ru") d-none @endif">
                                 <a class="list-group-link  dropdown-item-language d-flex gap-2 align-items-center" href="{{ Str::replaceFirst( app()->getLocale(), 'ru', request()->url() ) }}">
                                     <span class="language-label">
                                         <img src="{{ asset('images/flags/Russia-Flag-icon.png')}}" class="response-img lang" alt="ru"/>
                                     </span>
                                     <span class="language-label text-uppercase">
                                         RU
                                     </span>
                                 </a>
                             </li>
                        </ul>
                    </div>
                </div>
                <nav class="navbar navbar-expand-xxl d-none d-lg-block">
                      <div class="container-fluid p-0">
                          <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav w-100 justify-content-between">
                                  <li class="nav-item">
                                      <a class="nav-link  nav-category  position-relative decorated-line text-uppercase" href="{{ route('home.page', ['language' => app() -> getLocale()]) }}">{{ __('static.nav.home') }}</a>
                                  </li>
                                  @foreach($categories as $category)
                                      <li class="nav-item">
                                          <a class="nav-link  nav-category position-relative decorated-line text-uppercase text-focus" href="{{  route('category.page',['language' => app() -> getLocale(), 'category' => $category->id]) }}">{{ $category -> title -> $language }}</a>
                                      </li>
                                  @endforeach
                                  <li class="nav-item dropdown position-relative decorated-line">
                                      <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          {{ __('static.nav.media') }}
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-press rounded-0 py-0">
                                          @foreach( $sections as $section)
                                              @if( in_array($language, $section -> languages))
                                                  <li>
                                                      <a class="dropdown-item dropdown-item-press px-4 position-relative animated-line text-uppercase" href="{{ route('section.page', ['language' => app()->getLocale(), 'section' => $section->id]) }}">
                                                          {{ $section->title->$language }}
                                                      </a>
                                                  </li>
                                              @endif
                                          @endforeach
                                      </ul>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link nav-category position-relative decorated-line text-uppercase" href="{{ route('video.page', ['language' => app() -> getLocale()]) }}">{{ __('static.nav.video') }}</a>
                                  </li>
                              </ul>
                          </div>
                     </div>
                </nav>
            </div>
        </div>
    </div>
</div>



