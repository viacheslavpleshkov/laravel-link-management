<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('site.name') }}</title>
    <meta name="description" content="{{ __('site.description') }}"/>
    <meta name="keywords" content="Слава Плешков, Slava Pleshkov, Плешков В’ячеслав, Плешков, Pleshkov"/>
    <link rel="author" href="{{ asset ('humans.txt')}}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset ('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset ('site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset ('safari-pinned-tab.svg')}}" color="#4a6978">
    <meta name="msapplication-TileColor" content="#4a6978">
    <meta name="theme-color" content="#4a6978">
    <link href="{{ asset ('css/site.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="d-none d-sm-block">
        <div class="margin-top"></div>
    </div>
    <div class="row background">
        <div class="col-lg-4 pg">
            <div class="profile-container text-center">
                <img src="{{ asset ('images/logo.jpg')}}" alt="Logo">
                <h1>{{ __('site.name') }}</h1>
                <h3>Back-end Developer</h3>
            </div>
            <div class="div-container">
                <h2 class="container-block-title">
                    <i class="fas fa-globe"></i>{{ __('site.site-language') }}</h2>
                <ul class="container-degree">
                    <li><a href="{{ url('en') }}">{{ __('site.english') }}</a></li>
                    <li><a href="{{ url('uk') }}">{{ __('site.ukrainian') }}</a></li>
                    <li><a href="{{ url('ru') }}">{{ __('site.russian') }}</a></li>
                </ul>
            </div>
            {{ Widget::Contactwithme() }}
            {{ Widget::Knowledgeoflanguages() }}
            {{ Widget::Educations() }}
        </div>
        <div class="col-lg-8">
            <div class="main">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <small class="copyright">Слава Плешков ©2016-{{ date('Y') }}. Всі права захищені.</small>
    </footer>
</div>
<script src="{{ asset('js/site.js')}}"></script>
</body>
</html>