<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\state;
use App\Models\User;
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
    public function index(Request $request, $id = '')
    {
        $tableName = (new User)->getTable();
        $data['tablename'] = $tableName;
    
        if ($id != '') {
            $id = decrypt($id);
            $data['editemployee'] = User::where('id', $id)->first();
        } else {
            $data['editemployee'] = '';
        }
    

      $data['states'] = state::where('status',1)->get();
      $data['cities'] = city::where('status',1)->get();
    return view('admin.employee',$data);
   }
}
