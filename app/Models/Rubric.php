<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    protected $fillable = ['category_id', 'name', 'alias', 'description', 'text', 'image', 'sort_order', 'status'];

    public function lessons() {
        return $this->hasMany('App\Models\Lesson');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
