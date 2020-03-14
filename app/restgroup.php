<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restgroup extends Model
{
    public function group()
    {
        return $this->belongsTo('App\group');
    }
}
