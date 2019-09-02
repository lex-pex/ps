<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $headers['description'] }}">
    <meta name="keywords" content="бесплатные курсы программирования курс языка Java обучение для новичков с нуля основные главные навыки программиста">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $headers['pageTitle'] }}</title>
    <meta name="yandex-verification" content="f9baddcb96516d96" />
    <meta property="og:type"          content="website" />
    <meta property="og:image"         content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <meta property="og:title"         content="{{ $headers['title'] }}" />
    <meta property="og:description"   content="{{ $headers['description'] }}" />
    <meta property="og:url"           content="{{ $headers['url'] }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@progerskill.com" />
    <meta name="twitter:title" content="{{ $headers['title'] }}" />
    <meta name="twitter:description" content="{{ $headers['description'] }}" />
    <meta name="twitter:image" content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <link rel="shortcut icon" href="{{ asset('proger-skill-favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/psv.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fa/css/fa.min.css')}}">
</head>
<body>
@include('parts.menu')
<div role="main">
@include('parts.title.video')
<div class="container">
    <div class="row m-0 pt-4">
        <div class="col-12">
            <div class="action-btn">
                <a href="/sitemap">Начать обучение</a>
            </div>
        </div>
    </div>
</div>
@include('parts.title.intro')
<div class="container-fluid ps-header-area">
    <div class="row justify-content-center m-0">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h3>Профессия в <mark>IT</mark></h3>
            <div class="under-line"></div>
            <span>ЗАЧЕМ ОНА ?</span>
        </div>
    </div>
</div>
@include('parts.title.persuade-it')
    <div class="container ps-intro pb-5">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-8 col-md-10 col-sm-12 mb-3 text-center">
                <div class="ps-intro-block">
                    <h3>С ЧЕГО НАЧАТЬ ПРОГРАММИРОВАТЬ</h3>
                    <div class="under-line"></div>
                    <p>
                        На сегодня существует большой выбор языков программирования, но самые востребованные и высоко оплачиваемые для заказов и работы среди них лидируют:
                    </p>
                    <ul>
                        <li>Java </li>
                        <li>PHP </li>
                        <li>JavaScript</li>
                    </ul>
                    <hr/>
                    <p>
                        Но начинать обучение программированию лучше всего с Java, который содержит все приёмы и технологии языков программирования. PHP и JavaScript являются скриптовыми языками и не имеют множества тех возможностей, которыми обладают обычные языки программирования, такие как C#, C++ и Java
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ps-header-area">
        <div class="row justify-content-center m-0">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <h3>Почему <mark>Java</mark></h3>
                <div class="under-line"></div>
                <span>Чем хорош Java ?</span>
            </div>
        </div>
    </div>
@include('parts.title.persuade-java')
    <div class="container ps-intro pb-5">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-8 col-md-10 col-sm-12 mb-3 text-center">
                <div class="ps-intro-block">
                    <span>Переход на любой другой язык с <mark>JAVA</mark> самый лёгкий</span>
                    <div class="under-line"></div>
                    <i style="color:silver">ПРАВИЛЬНОЕ НАЧАЛО - ЗАЛОГ УСПЕХА</i>
                    <div class="container">
                        <div class="row m-0 pt-4">
                            <div class="col-12">
                                <div class="action-btn">
                                    <a href="/sitemap">Начать обучение</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('parts.footer')
<script src="/js/jq.js"></script>
<script src="/js/bs.js"></script>
<script src="/js/ps.js"></script>
</body>
</html>
