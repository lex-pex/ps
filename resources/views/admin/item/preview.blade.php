@extends('home')
@section('feed')
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive-md">
            <tr>
                <td colspan="2"><h4> {{ $title }} </h4></td>
                <td style="text-align:right"> <a title="Add new {{$type}}" href="/admin/{{$type}}/add"> + Add New </a> </td>
            </tr>
            <tr>
                <td colspan="3"><a href="/">Main</a> | <a href="/admin">Admin Pane</a> |
                    <a href="/admin/{{ $type == 'category' ? 'cats' : $type . 's' }}">
                        {{ $type == 'category' ? 'Categories' : ucfirst($type . 's') }} Lists</a>
                </td>
            </tr>
            <tr>
                <td width="20px"> {{ $item->id }} </td>
                <td style="text-align:center">  {{ $item->name }}  </td>
                <td style="text-align:right">
                    <a href="/admin/{{ $type }}/preview/{{$item->id}}">Preview</a> |
                    <a href="/admin/{{ $type }}/edit/{{$item->id}}">Edit</a>
                </td>
            </tr>
            <tr><td colspan="3" style="text-align:left;font-weight:bold">Description:</td></tr>
            <tr><td colspan="3" style="background: white">{{ $item->description }}</td>
            </tr>
            <tr>
                <td colspan="3"><img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" width="100%" /></td>
            </tr>
            <tr><td colspan="3" style="text-align:left;font-weight:bold">Text:</td></tr>
            <tr><td colspan="3" style="background:white;white-space:pre-wrap">{{ $item->text }}</td></tr>
            <tr>
                <td width="30%" style="text-align:left;font-weight:bold">Alias:</td>
                <td colspan="2"> {{ $item->alias }} </td>
            </tr>
            <tr>
                <td width="30%" style="text-align:left;font-weight:bold">
                    Parent {{ ucfirst($parentType) . ' #' . $item->getAttribute($parentType.'_id') }} :
                </td>
                <td colspan="2"> {{ $parentName }} </td>
            </tr>
            <tr>
                <td style="text-align:left;font-weight:bold">Status:</td>
                <td colspan="2">  {!! $item->status ? 'Shown' : '<span style="background:pink; padding:3px">Hidden</span>' !!}</td>  </td>
            </tr>
            <tr>
                <td style="text-align:left;font-weight:bold">Sort Order:</td>
                <td colspan="2"> <span style="background:aquamarine;padding:3px">{{ $item->sort_order }}</span> </td>
            </tr>
        </table>
    </div>
</div>
@endsection
