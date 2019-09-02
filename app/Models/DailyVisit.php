<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyVisit extends Model
{
    public $timestamps = false;
    protected $fillable = ['date', 'amount'];
}
