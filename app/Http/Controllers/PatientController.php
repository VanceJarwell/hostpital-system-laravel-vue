<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
class PatientController extends Controller
{
    public function index()
    {
        return Patient::all();
        return Appointment::all();
    }

    public function store()
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'cp_relationship' => 'required',
            'cp_phone' => 'required',
            'cp_address' => 'required',

        ]);
        
    	$patient = new Patient;
        $patient->firstname = request()->firstname;
        $patient->lastname = request()->lastname;
    	$patient->birthdate = request()->birthdate;
    	$patient->age = request()->age;
    	$patient->gender = request()->gender;
    	$patient->weight = request()->weight;
    	$patient->height = request()->height;
        $patient->phone = request()->phone; 
        $patient->address = request()->address;
        $patient->contact_person = request()->contact_person; 
    	$patient->cp_relationship = request()->cp_relationship;         
    	$patient->cp_phone = request()->cp_phone;         
    	$patient->cp_address = request()->cp_address;         
    	$patient->save();	
        return $patient;
    }
    public function destroy($id)
    {
        $patient = Patient::find($id->id);
        $patient->delete();
    }
}
