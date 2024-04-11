<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="{{ __('static.meta.description') }}">
<meta name="keywords" content="{{ __('static.meta.keywords') }}">
@yield('meta')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3WTJ1ZDFQJ"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-3WTJ1ZDFQJ');
</script>
<link rel="shortcut icon" href="{{ asset('images/themes/georgia-press-icon.jpg') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('styles/app.css?date=01/04/2024') }}" />
@yield('styles')
<title>@yield('title')</title>
