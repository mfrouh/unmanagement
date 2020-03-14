<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    public function sectiongroup()
    {
        return $this->belongsTo('App\sectiongroup');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function subject()
    {
        return $this->belongsTo('App\subject');
    }
}
