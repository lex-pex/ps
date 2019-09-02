<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['name', 'alias', 'description', 'text', 'image', 'sort_order', 'status'];

    public function categories() {
        return $this->hasMany('App\Models\Category');
    }
}
