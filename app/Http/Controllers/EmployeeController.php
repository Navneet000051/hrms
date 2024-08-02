<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Company;
use App\Models\country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Roles;
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
    

      $data['countries'] = country::where('status',1)->get();
    //   $data['pcountries'] = country::where('status',1)->get();
    //   $data['states'] = state::where('status',1)->get();
    //   $data['cities'] = city::where('status',1)->get(); 
      $data['companies'] = Company::where('status', 1)->get();     
      $data['departments'] = Department::where('status', 1)->get();     
      $data['roles'] = Roles::where('status', 1)->get();     
      $data['title'] = 'Employee';
      $data['designations'] = Designation::where('status', 1)->get();
    //   echo "<pre>";
    //   var_dump($data);exit();
    return view('admin.employee',$data);
   }
}
