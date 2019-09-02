@extends('cell')
@section('list')
@if($group->text)
<div class="row"><div class="psv-txt">{!! $group->text !!}</div></div>
@endif
@php $odd = 0; @endphp
@foreach($items as $item)
@if($odd++ % 2 == 0)<div class="row">@endif
<div class="col-lg-6 col-md-6 p-0">
    <div class="ps-card offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-xs-12 p-0">
        <span class="cell-label">{{ $itemsType ? $itemsType . ' ' . $item->sort_order : '' }}</span>
        <a href="/{{ $headers['url'] . '/' . $item->alias }}">
            <img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" style="width:100%"/>
            <div class="p-1">
                <h2>{{ $item->name }}</h2>
                <hr/>
                <p>{{ $item->description }}</p>
            </div>
        </a>
    </div>
</div>
@if($odd % 2 == 0)</div>@endif @endforeach
@if($odd % 2 != 0)
<div class="col-lg-6 col-md-6 p-0">
    <div class="ps-card offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-xs-12 p-0">
        <span class="cell-label">sitemap</span>
        <a href="/sitemap">
            <img src="/img/adv/map.jpg" style="width:100%"/>
            <div class="p-1">
                <h2>Карта сайта PS</h2>
                <p>
                    Карта ссылок сайта Proger Skill, для наглядного обзора данного самоучителя.
                    Для более удобного обучения это пособие по программированию разбито на участки
                    разных уровней в три ступени: Часть (язык программирования) /
                    Категория (уровень) сложности / Рубрика / Уроки
                </p>
            </div>
        </a>
    </div>
</div>
</div>
@endif
@endsection

