<!DOCTYPE html>
<html lang="ru"><head>
    <title>{{ $headers['pageTitle'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/ps.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fa/css/fa.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/font/ub.css')}}">
    <meta property="og:type"          content="website" />
    <meta property="og:image"         content="{{ $headers['image'] }}" />
    <meta property="og:title"         content="{{ $headers['title'] }}" />
    <meta property="og:description"   content="{{ $headers['description'] }}" />
    <meta property="og:url"           content="{{ $headers['url'] }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@vegansfreedom.com" />
    <meta name="twitter:title" content="{{ $headers['title'] }}" />
    <meta name="twitter:description" content="{{ $headers['description'] }}" />
    <meta name="twitter:image" content="{{ $headers['image'] }}" />
    <style>
        body{
            /*background:url('/img/bg/bg-gray.png') fixed;*/
            /*background:url('/img/bg/cute-stars.gif') fixed;*/
            /*background:url('/img/bg/box.png') #80bfff fixed;*/
            background:url('/img/bg/box.png') fixed;
            /*background:#a5c4e8;*/
            /*background:#80bfff;*/
            /*background:url('/img/bg/clo.jpg') fixed;*/
            /*background:limegreen;*/
        }
    </style>
</head>
<body>
@include('parts.sb')
@include('parts.nav')
<main role="main">
@include('parts.cell.jumbo')
<div class="ps-header">
    <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-sm-12 col-xs-12">

        <h1>{{ $headers['title'] }}</h1>
        <p style="font-size: 17px;padding: 15px">{{ $headers['description'] }}</p>
        <div class="ps-path">

            @php $slash = ''@endphp
            @foreach($path as $key => $value)

            <i style="color:silver">{{$slash}}</i> <a href="{{ $value }}">{{ $key }}</a>

            @php $slash = '/'@endphp
            @endforeach
        </div>
    </div>
</div>

<div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-sm-12 col-xs-12 p-0">

    <div class="row m-0 p-0">

        @foreach($items as $item)

        <div class=" col-ld-6 col-md-6 col-sm12 p-1 px-0">

            <div class="ps-card">

                <a href="{{ $headers['url'] . '/' . $item->alias }}">

                <img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" style="width: 100%"/>

                <div class="p-1">

                    <h2>{{ $item->name }}</h2>
                    <hr/>
                    <p>{{ $item->description }}</p>

                </div>

                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

</main>
@include('parts.footer')
<script src="/js/jq.js"></script>
<script src="/js/bs.js"></script>
<script src="/js/ps.js"></script>
</body>
</html>
