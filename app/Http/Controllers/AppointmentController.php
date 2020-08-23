<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Physician;
use App\Patient;
use App\Medical_Category;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::all();
    }

    public function store()
    {
        request()->validate([
            'physician_name' => 'required',
            'patient_name' => 'required',
            'medical_procedure' => 'required',
            'type_procedure' => 'required',
            'room' => 'required',
            'date' => 'required',
            'time' => 'required',

        ]);
        
    	$appointment = new Appointment;
        $appointment->physician_name = request()->physician_name;
        $appointment->patient_name = request()->patient_name;
    	$appointment->medical_procedure = request()->medical_procedure;
    	$appointment->type_procedure = request()->type_procedure;
    	$appointment->room = request()->room;
        $appointment->date = request()->date;
    	$appointment->time = request()->time;   
    	$appointment->save();	
        return $appointment;
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id->id);
        $appointment->delete();
    }
}
