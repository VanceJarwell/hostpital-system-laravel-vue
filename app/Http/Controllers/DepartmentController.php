<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\DepartmentMeta;

class DepartmentController extends Controller
{
    public function getDepartmentData()
    {
        return Department::all();
    }

    public function addDepartment(Request $request)
    {
        $department = new Department();

        $department->building_id = $request->building_id;

        $department->department_name = $request->department_name;

        $department->save();

        $this->addDescription($request, $department->id);
    }

    public function addDescription($request, $department_id)
    {
        $description = new DepartmentMeta();

        $description->department_id = $department_id;

        $description->description = $request->description;

        $description->save();
    }

    public function deleteDepartment(Request $request)
    {
        $department = Department::find($request->id);
        
        $department->delete();
    }
}
