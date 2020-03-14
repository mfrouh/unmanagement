<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function group()
    {
        return $this->belongsTo('App\group');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function content()
    {
        return $this->hasMany('App\content');
    }
    public function exam()
    {
        return $this->hasMany('App\exam');
    }
    public function section()
    {
        return $this->hasMany('App\section');
    }


}
