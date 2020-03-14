<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentresultexam extends Model
{
    public function exam()
    {
        return $this->belongsTo('App\exam');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
