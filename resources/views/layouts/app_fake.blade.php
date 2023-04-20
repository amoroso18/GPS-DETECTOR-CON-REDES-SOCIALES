<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>YouTube</title>
    <!-- Favicons -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="https://www.youtube.com/s/desktop/2fc4f2e2/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://www.youtube.com/s/desktop/2fc4f2e2/img/favicon_32x32.png" sizes="32x32">
    <link rel="icon" href="https://www.youtube.com/s/desktop/2fc4f2e2/img/favicon_48x48.png" sizes="48x48">
    <link rel="icon" href="https://www.youtube.com/s/desktop/2fc4f2e2/img/favicon_96x96.png" sizes="96x96">
    <link rel="icon" href="https://www.youtube.com/s/desktop/2fc4f2e2/img/favicon_144x144.png" sizes="144x144">
    <link rel="canonical" href="https://www.youtube.com/">
    <link rel="alternate" media="handheld" href="https://m.youtube.com/">
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.youtube.com/">
    <meta property="og:image" content="https://www.youtube.com/img/desktop/yt_1200.png">
    <meta property="fb:app_id" content="87741124305">
    <link rel="alternate" href="android-app://com.google.android.youtube/http/www.youtube.com/">
    <link rel="alternate" href="ios-app://544007664/vnd.youtube/www.youtube.com/">
    <meta name="description"
        content="Disfruta de los vídeos y la música que te gustan, sube material original y comparte el contenido con tus amigos, tu familia y el resto del mundo en YouTube.">
    <meta name="keywords" content="vídeo, compartir, teléfono con cámara, teléfono con vídeo, gratis, subida">
 
  @yield('content')


</html>


{{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
      >
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div> --}}
