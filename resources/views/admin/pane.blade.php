@extends('home')
@section('feed')
<div class="row">

    {{--<div style="position:absolute;right:5px;top:-25px;width:50px;height:50px;border-radius:50%;background:tomato;">--}}

    @php
    if($messages = Feedback::newMessages()) {
        $color = 'tomato';
    } else
        $color = 'limegreen';
    @endphp

    <a href="/admin/feedback" style="color:white">
        <div style="position:absolute;right:55px;top:-20px;padding:8px 15px 8px 15px;border-radius:50%;background:lightblue;">
            {{ Feedback::allMessages() ? Feedback::allMessages() : 0 }}
        </div>
        <div style="position:absolute;right:5px;top:-20px;padding:8px 15px 8px 15px;border-radius:50%;background:{{$color}};">
            {{ Feedback::newMessages() ? Feedback::newMessages() : 0 }}
        </div>
    </a>

    <div class="col-md-12">
        <table class="table table-responsive-md">
            <tr>
                <td><i style="color:dodgerblue; letter-spacing:0.2em">
                    @php
                        $visit = \App\Models\DailyVisit::all('date', 'amount')->last();
                    @endphp
                    {{ $visit->date }} : <b style="color:firebrick;background:yellow;padding:0 7px;">{{ $visit->amount }}</b></i>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/">Main</a> | @foreach($path as $name => $link)<a href="/{{ $link }}">{{ $name }}</a> | @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/admin/path">Path > > > </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/admin/parts">Parts</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/admin/cats">Categories</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/admin/rubrics">Rubrics</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/admin/lessons">Lessons</a>
                </td>
            </tr>
            <tr style="background:silver">
                <td>
                    <a href="/admin/ads">Ads</a>
                </td>
            </tr>
            <tr style="background: silver">
                <td>
                    <a href="/admin/menu_ads">Menu Ads</a>
                </td>
            </tr>
            <tr style="background: silver">
                <td>
                    <a href="/admin/carousels">Carousels</a>
                </td>
            </tr>
        </table>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div><hr/>
        <div style="width:100%;background:darkgray">&nbsp;</div>
        {{--<img src="/img/def/def.jpg" width="100%"/>--}}
        <div style="width:100%; background: darkgray">&nbsp;</div>
    </div>
</div>
@endsection