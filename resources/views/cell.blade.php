<!DOCTYPE html>
<html lang="ru"><head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $headers['description'] }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $headers['pageTitle'] }}</title>
    <meta property="og:type"          content="website" />
    <meta property="og:image"         content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <meta property="og:title"         content="{{ $headers['title'] }}" />
    <meta property="og:description"   content="{{ $headers['description'] }}" />
    <meta property="og:url"           content="{{ asset($headers['url']) }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@progerskill.com" />
    <meta name="twitter:title" content="{{ $headers['title'] }}" />
    <meta name="twitter:description" content="{{ $headers['description'] }}" />
    <meta name="twitter:image" content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <link rel="shortcut icon" href="{{ URL::asset('proger-skill-favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/ps.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/les.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/psv.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fa/css/fa.min.css')}}">
</head>
<body>
@include('parts.menu')
<main role="main">
{{--@include('parts.cell.jumbo')--}}
@include('parts.control_pane')
<div style="width: 100%; height: 30px;"> </div><!-- Spacer -->
<div class="container-fluid m-0">
<div class="row">
<div class="col-lg-1 text-center ps-btns">
<!-- left spacer -->
</div>
<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12"><!-- canvas -->
<div class="row">
    <div class="col-12 p-0">
        <div class="psv-header">
            <div class="psv-page-header">
                <h1>{{ $headers['title'] }}</h1>
                <div class="under-line"></div>
            </div>
            <div class="psv-page-description">
                <div class="row justify-content-center m-0">
                    <div class="col-lg-8 col-md-8 col-sm-12 p-0">
                        <p>{{ $headers['description'] }}</p>
                    </div>
                </div>
                <div class="row justify-content-center m-0">
                    <div class="col-lg-8 col-md-8 col-sm-12 p-0">
                        <img src="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-12 m-0">
                        <div class="psv-path">
                            @php $slash = ''@endphp
                            @foreach(isset($path) ? $path : [] as $key => $value)
                                <i style="color:gray">{{$slash}}</i> <a href="/{{ $value }}">{{ $key }}</a>
                                @php $slash = '/'@endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-12 m-0 pt-3">
@yield('list')
</div>
</div>
    <div class="row"><!-- Carbon -->
        <div class="ps-after col-12 p-0">
            <div class="ps-foot-pane">
                <div class="ps-prev-next" style="float:left;{{ $prevLink == '#' ? 'background:tomato' : '' }}" title="{{ $prevDescription }}">
                    <a href="{{ $prevLink }}">
                        <i class="fa fa-chevron-left fa-2x"></i>
                    </a>
                </div>
                Proger Skill Team
                <div class="ps-prev-next" style="float:right;{{ $nextLink == '#' ? 'background:tomato' : '' }}" title="{{ $nextDescription }}">
                    <a href="{{ $nextLink }}">
                        <i class="fa fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- End Carbon -->
</div><!-- End Canvas -->
<div class="col-lg-3 col-md-3">
@include('parts.cell.rb')
</div>
</div>
</div>
</main>
@include('parts.footer')
<script src="/js/jq.js"></script>
<script src="/js/bs.js"></script>
<script src="/js/ps.js"></script>
</body>
</html>
