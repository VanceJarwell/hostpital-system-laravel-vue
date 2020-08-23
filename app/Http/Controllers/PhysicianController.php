<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Physician;
use App\Department;
use App\Appointment;

class PhysicianController extends Controller
{
    public function index()
    {
        return Physician::all();
        return Appointment::all();
    }

    public function store()
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'specialization' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);
        
    	$physician = new Physician;
        $physician->firstname = request()->firstname;
        $physician->lastname = request()->lastname;
    	$physician->department = request()->department;
    	$physician->specialization = request()->specialization;
    	$physician->email = request()->email;
    	$physician->password = request()->password;
    	$physician->phone = request()->phone;
    	$physician->address = request()->address;      
    	$physician->save();	
        return $physician;
    }
    public function destroy(Request $id)
    {
        $physician = Physician::find($id->id);
        $physician->delete();
    }
 
}
