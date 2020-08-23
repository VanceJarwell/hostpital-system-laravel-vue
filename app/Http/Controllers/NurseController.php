<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nurse;

class NurseController extends Controller
{
    public function getNurseData()
    {
        return Nurse::all();
    }

    public function addNurse(Request $request)
    {

        $nurse = new Nurse();

        $nurse->department_id = $request->department_id;
 
        $nurse->first_name = $request->first_name;
 
        $nurse->last_name = $request->last_name;
 
        $nurse->email = $request->email;

        $nurse->phone_number = $request->phone_number;

        $nurse->password = $request->password;
 
        $nurse->address = $request->address;
 
        $nurse->save();
        
    }

    public function deleteNurse(Request $request)
    {
        $nurse = Nurse::find($request->id);
        
        $nurse->delete();
    }
}
