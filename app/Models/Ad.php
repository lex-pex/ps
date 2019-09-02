<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['name', 'alias', 'description', 'text', 'image', 'sort_order', 'status'];
}
