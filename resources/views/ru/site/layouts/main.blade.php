<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(!route('site.index')): @yield('title') |  @endif{{__('site.title')}}</title>
    <link rel="author" href="{{ asset ('humans.txt')}}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset ('icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset ('icons/safari-pinned-tab.svg') }}" color="#bd2d2d">
    <link rel="shortcut icon" href="{{ asset ('icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="{{__('site.title')}}">
    <meta name="application-name" content="{{__('site.title')}}">
    <meta name="msapplication-TileColor" content="#bd2d2d">
    <meta name="msapplication-TileImage" content="{{ asset ('icons/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset ('icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#bd2d2d">
    <link href="{{ asset ('css/site.css')}}" rel="stylesheet">
    {!! NoCaptcha::renderJs('ru') !!}
</head>
<body>
@include('site.include.nav')
<main role="main" class="container">
    @yield('content')
</main>
<script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
