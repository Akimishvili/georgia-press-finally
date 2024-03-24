<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<div class="wrapper py-4">
    <div class="container">
        <div class="row justify-content-between mb-4">
            <div class="col-6">
                <a type="button" class="btn btn-primary" href="#">
                    <i class="bi bi-person"></i>
                    <span class="text-label">gpress@admin.panel</span>
                </a>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('admin.logout', ['language' => app() -> getLocale()]) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning float-end">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="text-label">Logout</span>
                    </button>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                @include('partials.accordion')
            </div>
            <div class="col-lg-8 mb-4 bg-dark-blue p-4 rounded">
                @yield('main')
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.tiny.cloud/1/yu4ov2g7qn4hup219i0ahf4wzwcsvtkns120joev89fik6t2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@yield('scripts')
</body>
</html>
