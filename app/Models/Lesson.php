<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

    protected $fillable = ['rubric_id', 'name', 'description', 'text','alias', 'image', 'status' , 'sort_order'];

    public function rubric() {
        return $this->belongsTo('App\Models\Rubric');
    }

}
