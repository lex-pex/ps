@extends('home')
@section('feed')
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive-md">
            <tr>
                <td colspan="3">
                    <a href="/">Main</a> |
                    <a href="/admin">Admin</a> |
                    <a href="/admin/feedback">Feedback List</a> | Message
                </td>
            </tr>
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><small>{{ date('d/m/y | H:i', strtotime($item->created_at)) }}</small></td>
            </tr>
            <tr>
                <td colspan="3" style="background: white">{{ $item->text }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right">
                    <button class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('item-del-form').submit()">Delete</button>
                    <form id="item-del-form" action="{{ route('feedbackDel', ['item' => $item]) }}" method="post" style="display:none;">
                        @csrf
                    </form>
                </td>
            </tr>
        </table>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div>
        <img src="/img/def/def.jpg" width="100%"/>
        <div style="width:100%; background: darkgray">&nbsp;</div>

    </div>
</div>
@endsection