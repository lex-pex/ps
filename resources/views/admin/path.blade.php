@extends('home')
@section('feed')
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive-md">
            <tr>
                <td colspan="4"><h4> {{ $title }} </h4></td>
                <td style="text-align:right"> <a title="Add new {{$type}}" href="/admin/{{$type}}/add"> + Add New </a> </td>
            </tr>
            <tr>
                <td colspan="5">
                    <a href="/">Main</a> | @foreach($path as $name => $link)<a href="/{{ $link }}">{{ $name }}</a> | @endforeach
                </td>
            </tr>
            @foreach($items as $item)
            <tr>
                <td width="20px"> {{ $item->id }} </td>
                <td> <a href="/{{ $currentLink . '/' . $item->alias }}"> {{ $item->name }} </a> </td>
                <td width="10px"><span style="background:aquamarine;padding:3px">{{ $item->sort_order }}</span></td>
                <td width="10px">{!! $item->status ? 'Shown' : '<span style="background:pink; padding:3px">Hidden</span>' !!}</td>
                <td style="text-align:right">
                    <a href="/admin/{{$type}}/preview/{{$item->id}}">Preview</a> |
                    <a href="/admin/{{$type}}/edit/{{$item->id}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div>
        <img src="/img/def/def.jpg" width="100%"/>
        <div style="width:100%; background: darkgray">&nbsp;</div>
    </div>
</div>
@endsection