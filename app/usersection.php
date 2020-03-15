<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersection extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }
  public function sectiongroup()
  {
      return $this->belongsTo('App\sectiongroup');
  }
}
