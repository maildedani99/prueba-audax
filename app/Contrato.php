<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
