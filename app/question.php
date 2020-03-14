<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
   public function exam()
   {
       return $this->belongsTo('App\exam');
   }
}
