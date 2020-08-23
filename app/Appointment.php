<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{

    protected $appends = ['patients','physician'];
    public function getPatientsAttribute()
    {
        $patient = Patient::where('id', $this->patient_name)->first();
        return $patient ?? null;
    }
    public function getPhysicianAttribute()
    {
        $physician = Physician::where('id', $this->physician_name)->first();
        return $physician ?? null;
    }
    //use SoftDeletes;
}
