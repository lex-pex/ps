<div style="text-align:center;color:gray;text-shadow:1px 1px 1px white;padding:10px 0 0 0"> <h5>рекомендации:</h5></div>
@foreach(Ad::feed($headers['url']) as $item)
<div class="ps-ad">
    <hr/><div class="p-1"><h2>{{ $item->name }}</h2></div>
    <a target="_blank" href="{{ $item->alias }}">
        <img src="{{ $item->image ? $item->image : '/img/def/def.jpg' }}" style="width:100%"/>
        <div class="p-1"><p>{{ $item->description }}</p></div>
    </a>
</div>
@endforeach