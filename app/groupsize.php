<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupsize extends Model
{
    public function group()
    {
        return $this->belongsTo('App\group');
    }
    public function restgroup()
    {
      return $this->hasOne('App\restgroup');
    }
    public function groupsize()
    {
      return $this->hasOne('App\groupsize');
    }
}

