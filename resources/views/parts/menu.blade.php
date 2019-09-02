<div id="sidebar" class="col-lg-5 col-md-6 col-sm-8 col-xs-12" style="display:none;">
    <ul class="sidebar-nav">
    @foreach($menu = Menu::feed() as $a) <!-- PARTS -->
        <li class="menu-first-item">
            <a data-target="#{{$a->urn}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($a->list)) &nbsp; <i style="color:silver" class="fa fa-angle-right fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
            <a href="/{{$a->urn}}">{{$a->name}}</a>
        </li>
        <ul class="collapse list-group" id="{{$a->urn}}">
        @foreach($a->list as $b) <!-- CATEGORIES -->
            <li class="menu-second-item">
                <a data-target="#{{preg_replace('~/~','_',$b->urn)}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($b->list)) &nbsp; <i style="color:gray" class="fa fa-angle-right fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
                <a href="/{{$b->urn}}">{{ isset($b->name) ? $b->name : 'CATEGORY' }}</a>
            </li>
            <ul id="{{preg_replace('~/~','_',$b->urn)}}" class="collapse list-group">
            @foreach($b->list as $c) <!-- RUBRICS -->
                <li class="menu-third-item">
                    <a data-target="#{{preg_replace('~/~','_',$c->urn)}}" data-toggle="collapse" aria-expanded="true" class="ps-toggler">@if(count($c->list)) &nbsp; <i style="color:#333" class="fa fa-angle-right fa-2x"></i> @else <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> @endif</a>
                    <a href="/{{$c->urn}}">{{ isset($c->name) ? $c->name : 'RUBRIC' }}</a>
                </li>
                <ul id="{{preg_replace('~/~','_',$c->urn)}}" class="collapse list-group"> <!-- LESSONS colapsed -->
                    @foreach($c->list as $d)
                        <li class="menu-fourth-item">
                            <a data-target="#" data-toggle="collapse" aria-expanded="true" class="ps-toggler"> <i style="color:limegreen" class="fa fa-file-text-o fa-2x"></i> </a>
                            <a href="/{{$d->urn}}"> {{ isset($d->name) ? $d->name : 'LESSON' }} </a>
                        </li>
                    @endforeach
                </ul>
                @endforeach
            </ul>
            @endforeach
        </ul>
        @endforeach
    </ul>
<div class="col-12 pl-5 pr-5"><!-- Menu Ads Area -->
    <div style="text-align:center;color:gray;text-shadow:1px 1px 1px white;padding:10px 0 0 0"> <h5>рекомендации:</h5></div>
    @foreach(Ad::feedMenu($headers['url']) as $item)
        <div class="ps-ad">
            <div class="p-1"><h2>{{ $item->name }}</h2></div>
            <a target="_blank" href="{{ $item->alias }}">
                <img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" style="width:100%"/>
                <div class="p-1"><p>{{ $item->description }}</p></div>
            </a>
        </div><hr/>
    @endforeach
</div><!-- End Menu Ads Area -->
<div class="ps-carbon">&copy; Proger Skill Team</div><div style="height:45px"></div><!-- Spaces for Menu Ads Area -->
</div><!-- sidebar -->
<nav class="navbar navbar-expand-md fixed-top navbar-light bg-light text-black"> <!-- fixed-top  _  navbar-dark bg-dark -->
    <a id="menu-toggle" class="navbar-brand" onclick="sb_toggle()"> <!-- href="#menu-toggle" -->
        <span style="color:gray" id="btn-toggler" class="fa fa-bars"></span> <!-- navbar-toggler-icon -->
    </a>
    <a class="navbar-brand" href="/">Proger Skill</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbid" aria-controls="nbid" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nbid">
        <ul class="navbar-nav mr-auto">
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
                    <div class="dropdown-divider"></div> <!-- Main Link -->
                    @foreach($a->list as $b)
                        <a class="dropdown-item" href="/{{ $b->urn }}">{{ $b->name }}</a>
                    @endforeach
                </div>
            </li>
            @endif
        @endforeach
    </div>
</nav>
<div style="height:47px;background:#3c3c3c"></div><!-- spacer -->