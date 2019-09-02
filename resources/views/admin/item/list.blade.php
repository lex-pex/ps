@extends('home')
@section('feed')
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive-md">
            <tr>
                <td colspan="5"><h4> {{ $title }} </h4></td>
                <td style="text-align:right"> <a title="Add new {{$type}}" href="/admin/{{$type}}/add"> + Add New </a> </td>
            </tr>
            <tr>
                <td colspan="6">
                    <a href="/">Main</a> | <a href="/admin">Admin Pane</a> |
                    <b><span style="text-transform:capitalize">{{$type}}</span> List</b>
                </td>
            </tr>
            @foreach($items as $item)
            <tr>
                <td width="1%">{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td><span style="background:lightblue;padding:3px">{{ $item->getAttribute($parent) ? $item->getAttribute($parent)->name : 'NONE' }}</span></td>
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