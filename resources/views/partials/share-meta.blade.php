@php
    use Illuminate\Support\Str;
@endphp
<meta property="og:title" content='{{ $article -> title -> $language }}' />
<meta property="og:description" content='{{ Str::substr( strip_tags($article -> description -> $language), 0, 150)}}' />
<meta property="og:image" content='{{ $article -> image }}' />
<meta property="og:url" content='{{ url() -> current() }}' />
<meta property="og:locate" content='{{ app() -> getLocale() }}' />
<meta property="og:type" content='website' />
<meta property="og:site_name" content='GeorgiaPress' />
<!--  twitter -->
<meta name="twitter:title" content='{{ $article -> title -> $language }}' />
<meta name="twitter:description" content='{{ Str::substr( strip_tags( $article -> description -> $language), 0, 150)}}' />
<meta name="twitter:image" content='{{ $article -> image }}' />
<meta name="twitter:card" content='summary_large_image' />
