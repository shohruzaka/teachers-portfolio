<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'dep_name'=>'required'
        ]);
        Department::create($request->all());
        return redirect()->route('cabinet')->with('success',"Kafedra qo'shildi");
    }
}
