<?php

namespace App\Assist\Facades;

use Illuminate\Support\Facades\Facade;

class Feedback extends Facade{
    public static function getFacadeAccessor(){
        return 'feedback';
    }
}