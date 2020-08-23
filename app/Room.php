<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $appends = ['building'];

    public function getBuildingAttribute()
    {
        $building = Building::where('id', $this->building_id)->first();

        return $building->building_name ?? null;
    }
}
