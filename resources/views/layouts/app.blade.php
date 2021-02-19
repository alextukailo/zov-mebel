<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ЗОВ') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="https://zovofficial.com/images/icon/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://zovofficial.com/images/icon/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://zovofficial.com/images/icon/favicons/favicon-16x16.png">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
