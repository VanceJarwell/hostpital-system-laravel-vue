<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $appends = ['building', 'description'];

    public function getBuildingAttribute()
    {
        $building = Building::where('id', $this->building_id)->first();

        return $building->building_name ?? null;
    }

    public function getDescriptionAttribute()
    {
        $department = DepartmentMeta::where('department_id', $this->id)->first();

        return $department->description ?? null;
    }
}
