<!DOCTYPE html>
<html lang="ru"><head>
    <title>{{ $headers['pageTitle'] }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::asset('proger-skill-favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/ps.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/fa/css/fa.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/font/ub.css')}}">
    <meta property="og:type"          content="website" />
    <meta property="og:image"         content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <meta property="og:title"         content="{{ $headers['title'] }}" />
    <meta property="og:description"   content="{{ $headers['description'] }}" />
    <meta property="og:url"           content="{{ $headers['url'] }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@vegansfreedom.com" />
    <meta name="twitter:title" content="{{ $headers['title'] }}" />
    <meta name="twitter:description" content="{{ $headers['image'] ? $headers['image'] : '/img/def/def.jpg' }}" />
    <meta name="twitter:image" content="{{ $headers['image'] }}" />
    {{--<style> body{background:url('/img/bg/box.png') fixed;}</style>--}}
</head>
<body>

<!-- Nav Bar -->

@include('parts.sb')

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <!-- fixed-top -->

    <a id="menu-toggle" class="navbar-brand" onclick="sb_toggle()"> <!-- href="#menu-toggle" -->
        <span style="color:white" id="btn-toggler" class="fa fa-bars"></span> <!-- navbar-toggler-icon -->
    </a>

    <a class="navbar-brand" href="/">Proger Skill</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbid" aria-controls="nbid" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nbid">
        <ul class="navbar-nav mr-auto">
            @php $menu = Menu::feed() // FROM SB @endphp
            @foreach($menu as $a)
                @if(!count($a->list))
                <li class="nav-item">
                    <a class="nav-link" href="/{{ $a->urn }}">{{ $a->name }}</a>
                </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="#{{$a->urn}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $a->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="#{{$a->urn}}">
                            <a class="dropdown-item" href="/{{ $a->urn }}">{{ $a->name }}</a>
                            <div class="dropdown-divider"></div> <!-- Main Link Here -->
                            @foreach($a->list as $b)
                            <a class="dropdown-item" href="/{{ $b->urn }}">{{ $b->name }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
    </div>
</nav>
<div style="height:53px"></div><!-- spacer -->

<!-- Ent Nav Bar -->

<main role="main">
    {{--@include('parts.cell.jumbo')--}}
    <div class="container-fluid m-0">
        <div class="row">
            <div class="col-lg-1 text-center ps-btns">
                <span><img src="/img/btns/1.png"/></span>
                <span><img src="/img/btns/2.png"/></span>
                <span><img src="/img/btns/3.png"/></span>
                <span><img src="/img/btns/4.png"/></span>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-12 p-0">
                        <img src="/img/def/def.jpg" width="100%"/>
                    </div>
                    <div class="col-12 p-0">

<hr/>

        <div id="HIDE_sidebar" class="col-lg-8 col-md-10 col-sm-12">

            <ul class="sidebar-nav">

                @foreach(Menu::feed() as $a) <!-- PARTS -->

                <li class="menu-first-item">
                    <a data-target="#{{$a->urn}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($a->list)) <i style="color:silver" class="fa fa-caret-down fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
                    <a href="/{{$a->urn}}">{{$a->name}}</a>
                </li>

                <ul class="collapse list-group" id="{{$a->urn}}">

                @foreach($a->list as $b) <!-- CATEGORIES -->

                    <li class="menu-second-item">
                        <a data-target="#{{preg_replace('~/~','_',$b->urn)}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($b->list)) <i style="color:gray" class="fa fa-caret-down fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
                        <a href="/{{$b->urn}}">{{ isset($b->name) ? $b->name : 'CATEGORY' }}</a>
                    </li>

                    <ul id="{{preg_replace('~/~','_',$b->urn)}}" class="collapse list-group">

                        @foreach($b->list as $c) <!-- RUBRICS -->

                        <li class="menu-third-item">
                            <a data-target="#{{preg_replace('~/~','_',$c->urn)}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($c->list)) <i style="color:#333" class="fa fa-caret-down fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
                            <a href="">{{ isset($c->name) ? $c->name : 'RUBRIC' }}</a>
                        </li>

                        <ul id="{{preg_replace('~/~','_',$c->urn)}}" class="collapse list-group colapsed"> <!-- LESSONS -->

                            @foreach($c->list as $d)
                            <li class="menu-fourth-item">
                                <a data-target="#" data-toggle="collapse" aria-expanded="true" class="ps-toggler"> <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> </a>
                                <a href=""> {{ isset($d->name) ? $d->name : 'LESSON' }} </a>
                            </li>
                            @endforeach

                        </ul>

                        @endforeach

                    </ul>

                @endforeach

                </ul>

                @endforeach

            </ul>

        </div>

<hr/>
<hr/>
<hr/>
<hr/>

                @foreach(Menu::feed() as $a)
                    <b> {{ $a->name }} </b> <br/>
                    <b> {{ $a->urn }} </b> <br/>
                    @foreach($a->list as $b)
                        ________ {{ $b->name }} <br/>
                        ________ {{ $b->urn }} <br/>
                        @foreach($b->list as $c)
                            ________________ {{ $c->name }} <br/>
                            ________________ {{ $c->urn }} <br/>
                            @foreach($c->list as $d)
                            ________________________________ {{ $d->name }} <br/>
                            ________________________________ {{ $d->urn }} <br/>
                            @endforeach
                        @endforeach
                    @endforeach
                    <hr/>
                @endforeach



                <div id="HIDE_sidebar" class="col-lg-3 col-md-4 col-sm-8" style="display:;">
                    <ul class="sidebar-nav">

                        <li>
                            <a href="/java">Уроки Java Главная</a>
                        </li>

                        <li>Java Категории</li>

                        <li>  <!-- Double Inner Block -->
                            <a href="#accordion" data-target="#accordion" class="menu-first-item" data-toggle="collapse">
                                PART &nbsp; <i class="dropdown-toggle"></i>
                            </a>
                        </li>

                        <ul class="collapse list-group" id="accordion">

                            <li id="headingOne" class="menu-second-item">
                                <a href="#collapseOne" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                    CATEGORY 1  &nbsp; <i class="dropdown-toggle"></i>
                                </a>
                            </li>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <ul class="list-group">

                                    {{--<li class="menu-third-item"><a href="">RUBRIC 1</a></li>--}}

                                    <li>  <!-- Inner Block -->
                                        <a href="#posts" class="menu-third-item" data-toggle="collapse" data-target="#posts">
                                            RUBRIC 1  &nbsp; <span class="dropdown-toggle"></span>
                                        </a>
                                    </li>
                                    <div class="collapse" id="posts">
                                        <ul class="list-group">
                                            <li class="menu-fourth-item"><a href="">Introduction</a> </li>
                                            <li class="menu-fourth-item"><a href="">Java OOP</a> </li>
                                            <li class="menu-fourth-item"><a href="">Data Structures</a> </li>
                                            <li class="menu-fourth-item"><a href="">User Interface</a> </li>
                                        </ul>
                                    </div>   <!-- End Inner Block -->




                                    <li class="menu-third-item"><a href="">RUBRIC 2</a></li>
                                    <li class="menu-third-item"><a href="">RUBRIC 3</a></li>
                                    <li class="menu-third-item"><a href="">RUBRIC 4</a></li>
                                </ul>
                            </div>



                            <li id="headingTwo" class="menu-second-item">
                                <a href="#collapseTwo" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                    CATEGORY 2 <i class="dropdown-toggle"></i>
                                </a>
                            </li>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <ul class="list-group">
                                    <li class="menu-third-item"><a href="">RUBRIC 5</a></li>
                                    <li class="menu-third-item"><a href="">RUBRIC 6</a></li>
                                    <li class="menu-third-item"><a href="">RUBRIC 7</a></li>
                                    <li class="menu-third-item"><a href="">RUBRIC 8</a></li>
                                </ul>
                            </div>



                            <li id="headingThree" class="menu-second-item">
                                <a href="#collapseThree" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
                                    CATEGORY 3  <i class="dropdown-toggle"></i>
                                </a>
                            </li>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <ul class="list-group">
                                    <li class="menu-third-item"><a href="">Тефтели</a></li>
                                    <li class="menu-third-item"><a href="">Котлеты</a></li>
                                    <li class="menu-third-item"><a href="">Соевый биток</a></li>
                                    <li class="menu-third-item"><a href="">Колбаски</a></li>
                                </ul>
                            </div>
                        </ul>  <!-- End Double Inner Block -->







<hr/>
<hr/>
<hr/>
<hr/>




















                                <li class="sidebar-brand">
                                    <a href="/"> Prog Skill </a>
                                </li>
                                <li>
                                    <a href="/">Главная</a>
                                </li>

                                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                                <li> <!-- Double Inner Block -->
                                    <a href="#accordion" data-toggle="collapse">
                                        Рецепты <i class="dropdown-toggle"></i>
                                    </a>
                                </li>
                                <ul class="collapse list-group" id="accordion">
                                    <li id="headingOne" class="menu-second-item">
                                        <a href="#collapseOne" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                            Первые блюда  <i class="dropdown-toggle"></i>
                                        </a>
                                    </li>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <ul class="list-group">
                                            <li class="menu-third-item"><a href="">Солянка</a></li>
                                            <li class="menu-third-item"><a href="">Чечевичный</a></li>
                                            <li class="menu-third-item"><a href="">Зеленый борщ</a></li>
                                            <li class="menu-third-item"><a href="">Красный борщ</a></li>
                                        </ul>
                                    </div>
                                    <li id="headingTwo" class="menu-second-item">
                                        <a href="#collapseTwo" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                            Гарниры  <i class="dropdown-toggle"></i>
                                        </a>
                                    </li>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <ul class="list-group">
                                            <li class="menu-third-item"><a href="">Картофель</a></li>
                                            <li class="menu-third-item"><a href="">Спагетти</a></li>
                                            <li class="menu-third-item"><a href="">Овощое рагу</a></li>
                                            <li class="menu-third-item"><a href="">Каша</a></li>
                                        </ul>
                                    </div>
                                    <li id="headingThree" class="menu-second-item">
                                        <a href="#collapseThree" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
                                            Закуски  <i class="dropdown-toggle"></i>
                                        </a>
                                    </li>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <ul class="list-group">
                                            <li class="menu-third-item"><a href="">Тефтели</a></li>
                                            <li class="menu-third-item"><a href="">Котлеты</a></li>
                                            <li class="menu-third-item"><a href="">Соевый биток</a></li>
                                            <li class="menu-third-item"><a href="">Колбаски</a></li>
                                        </ul>
                                    </div>
                                </ul>  <!-- End Double Inner Block -->

                                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                                <li>
                                    <a href="#">Здоровье</a>
                                </li>
                                <li>
                                    <a href="#">Советы</a>
                                </li>
                                <li>
                                    <a href="#">Гороскоп</a>
                                </li>
                                <li>  <!-- Inner Block -->
                                    <a href="#recipes" data-toggle="collapse" data-target="">
                                        Упражнения <span class="dropdown-toggle"></span>
                                    </a>
                                </li>
                                <div class="collapse" id="recipes">
                                    <ul class="list-group">
                                        <li class="menu-second-item"><a href="">Утренняя зарядка</a> </li>
                                        <li class="menu-second-item"><a href="">Спортивное дыхание</a> </li>
                                        <li class="menu-second-item"><a href="">Гимнастика</a> </li>
                                        <li class="menu-second-item"><a href="">Тяжелая атлетика</a> </li>
                                    </ul>
                                </div>   <!-- End Inner Block -->
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>






                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                @include('parts.cell.rb')
            </div>
        </div>
</main>
@include('parts.footer')
<script src="/js/jq.js"></script>
<script src="/js/bs.js"></script>
<script src="/js/ps.js"></script>
</body>
</html>




