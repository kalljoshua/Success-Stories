<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
