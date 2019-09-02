@auth
<div style="position: fixed; top:18%; left:0;z-index: 1">
    <div class="control_pane_area">
        <p onclick="control_toggle()">
            <i id="toggle-control" class="fa fa-bars"></i>
        </p>
        <div id="control-pane" style="display:none">
            <p>
                <a style="color:#fff" href="/admin">Admin Pane</a>
            </p>
            <p>
                <a style="color:#fff; text-transform:capitalize" href="/admin/{{ $type }}/edit/{{ $id }}">Edit {{ $type }}</a>
            </p>
            <p>
                <a style="color:#fff; text-transform:capitalize" href="/admin/{{ $type }}/preview/{{ $id }}">Preview {{ $type }}</a>
            </p>
            <p>
                <a style="color:#fff;text-transform:capitalize" href="/admin/{{ $type }}/add">Add {{ $type }}</a>
            </p>
        </div>
    </div>
</div>
@endauth
