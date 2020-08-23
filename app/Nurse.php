<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nurse extends Model
{
    use SoftDeletes;

    protected $appends = ['department'];

    public function getDepartmentAttribute()
    {
        $department = Department::where('id', $this->department_id)->first();

        return $department->department_name ?? null;
    }
}
