<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parentgroup extends Model
{
    public function group()
    {
        return $this->hasMany('App\group');
    }
}
