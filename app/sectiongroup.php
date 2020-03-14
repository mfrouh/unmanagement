<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sectiongroup extends Model
{
    public function group()
    {
        return $this->belongsTo('App\group');
    }
    public function section()
    {
        return $this->hasMany('App\section');
    }
}
