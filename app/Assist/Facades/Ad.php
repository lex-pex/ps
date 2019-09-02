<?php
namespace App\Assist\Facades;
use Illuminate\Support\Facades\Facade;
class Ad extends Facade{
    public static function getFacadeAccessor(){
        return 'advert';
    }
}