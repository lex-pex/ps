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
                <ul id="{{preg_replace('~/~','_',$c->urn)}}" class="collapse list-group colapsed"> <!-- LESSONS -->
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
</div>