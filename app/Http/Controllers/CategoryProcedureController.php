<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medical_Category;

class CategoryProcedureController extends Controller
{
    public function index()
    {
        return Medical_Category::all();
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            

        ]);
        
    	$medical_category = new Medical_Category;
        $medical_category->name = request()->name;
        $medical_category->description = request()->description;
    	$medical_category->save();	
        return $medical_category;
    }
    public function destroy($id)
    {
        $medical_category = Medical_Category::find($id->id);
        $medical_category->delete();
    }
}
