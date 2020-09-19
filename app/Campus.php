<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    //
    public function institute()
    {
        return $this->hasMany('App\Insitute','id_campus');
    }
  
}
