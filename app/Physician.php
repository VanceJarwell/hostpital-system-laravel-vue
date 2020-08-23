<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physician extends Model
{
    //use SoftDeletes;
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
    
}
