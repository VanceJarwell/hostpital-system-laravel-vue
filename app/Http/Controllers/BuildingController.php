<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;

class BuildingController extends Controller
{
    public function getBuildingData(){
        return Building::all();
    }

    public function addBuidling(Request $request)
    {
        $building = new Building();

        $building->building_name = $request->building_name;

        $building->floors = $request->floors;

        $building->save();
    }

    public function deleteBuilding(Request $request)
    {
        $building = Building::find($request->id);
        
        $building->delete();
    }
}
