<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['part_id', 'name', 'alias', 'description', 'text', 'image', 'sort_order', 'status'];

    public function rubrics() {
        return $this->hasMany('App\Models\Rubric');
    }

    public function part() {
        return $this->belongsTo('App\Models\Part');
    }

}
