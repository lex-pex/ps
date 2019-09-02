<?php
namespace App\Assist;

use App\Assist\Contracts\Advert;
use App\Models\Ad;
use App\Models\MenuAd;

class AdvertImpl implements Advert{
    public function feed(string $url = null){
        $array = Ad::all()->where('status', 1)->sortByDesc('sort_order');
        return $array;
    }
    public function feedMenu(string $url = null){
        $array = MenuAd::all()->where('status', 1)->sortByDesc('sort_order');
        return $array;
    }
}
