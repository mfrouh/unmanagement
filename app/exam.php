<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\subject');
    }
    public function question()
    {
        return $this->hasMany('App\question');
    }
    public function studentresultexam()
    {
        return $this->hasMany('App\studentresultexam');
    }
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
