<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'/>

    <!-- FUCSSIA -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/M6Irinel/Framkcss@7afed426c3eb96b21f164839fc10279163084c3c/Framkcss.css">

</head>

<body class="reset">
    <div id="app"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>
</body>

</html>
