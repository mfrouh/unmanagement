<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{

   public function studentclass()
   {
       return $this->hasMany('App\studentclass');
   }
  public function subject()
  {
      return $this->hasMany('App\subject');
  }
  public function parentgroup()
  {
      return $this->belongsTo('App\parentgroup');
  }
}
