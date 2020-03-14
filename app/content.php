<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\subject');
    }
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
