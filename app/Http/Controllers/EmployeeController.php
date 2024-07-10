<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   /**
    * A description of the entire PHP function.
    *
    * @param datatype $paramname description
    * @throws Some_Exception_Class description of exception
    * @return Some_Return_Value
    */
   public function index(){
    return view('admin.employee');
   }
}
