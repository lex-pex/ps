@extends('cell')
@section('list')
<div class="row mt-3" style="background:white; padding:15px">
    <div class="col-12 pb-4">
        {!! $item->text !!}
    </div>
    <h3 style="color:#0074D9">Страницы сайта ProgerSkill</h3>
    <div class="map-block pt-3">
        <div class="map-links">
            @foreach(Menu::feed() as $a)
                <div style="display:block;padding-left:0">
                    {!! count($a->list) ? '<i style="color:#333" class="fa fa-angle-right"></i>' : '<i style="color:limegreen" class="fa fa-file-text-o"></i>'!!}
                    <a href="/{{ $a->urn }}">{{ $a->name }}</a>
                </div>
                @foreach($a->list as $b)
                    <div style="display:block;padding-left: 40px">
                        {!! count($b->list) ? '<i style="color:#333" class="fa fa-angle-right"></i>' : '<i style="color:limegreen" class="fa fa-file-text-o"></i>'!!}
                        <a href="/{{ $b->urn }}">{{ $b->name }}</a>
                    </div>
                    @foreach($b->list as $c)
                        <div style="display:block;padding-left: 80px">
                            {!! count($c->list) ? '<i style="color:#333" class="fa fa-angle-right"></i>' : '<i style="color:limegreen" class="fa fa-file-text-o"></i>'!!}
                            <a href="/{{ $c->urn }}">{{ $c->name }}</a>
                        </div>
                        @foreach($c->list as $d)
                            <div style="display:block;padding-left: 120px">
                                <i style="color:limegreen" class="fa fa-file-text-o"></i>
                                <a href="/{{ $d->urn }}">{{ $d->name }}</a>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
                <hr/>
            @endforeach
        </div>
     </div>
</div>
@endsection