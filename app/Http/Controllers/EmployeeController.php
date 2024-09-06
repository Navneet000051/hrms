<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Company;
use App\Models\country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EducationDocument;
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
      // Retrieve the user along with their education documents
      $data['editemployee'] = User::with('educationDocuments')->where('id', $id)->first();
  } else {
      $data['editemployee'] = '';
  }

    $data['countries'] = country::where('status', 1)->get();
    $data['companies'] = Company::where('status', 1)->get();
    $data['departments'] = Department::where('status', 1)->get();
    $data['roles'] = Roles::where('status', 1)->get();
    $data['title'] = 'Employee';
    $data['designations'] = Designation::where('status', 1)->get();
    $data['employees'] = User::get();
    return view('admin.employee', $data);
  }
  public function getEmployee(Request $request, $id = '')
  {
    $tableName = (new User)->getTable();
    $data['tablename'] = $tableName;

    if ($id != '') {
      $id = decrypt($id);
      // dd($id);
      $data['editemployee'] = User::where('id', $id)->first();
    } else {
      $data['editemployee'] = '';
    }


    $data['countries'] = country::where('status', 1)->get();
    $data['companies'] = Company::where('status', 1)->get();
    $data['departments'] = Department::where('status', 1)->get();
    $data['roles'] = Roles::where('status', 1)->get();
    $data['title'] = 'Employee';
    $data['designations'] = Designation::where('status', 1)->get();
    return view('admin.add-employee', $data);
  }
  public function save(Request $request, $id = null)
{
    $id = $request->input('id');
    $isUpdate = !is_null($id);

    // Validation rules
    $rules = [
        'document_type.*' => 'required|string',
        'document_name.*' => 'nullable|string',
        'certificate.*' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
    ];

    // Validate the request
    $request->validate($rules);

    // Process the uploaded files
    $certificates = [];
    if ($request->hasFile('certificate')) {
        foreach ($request->file('certificate') as $file) {
            $certificates[] = $file->store('certificates');
        }
    }

    // Store or update user
    if ($isUpdate) {
        // dd($id);
        $user = User::findOrFail($id);
        // dd($request->all());
        $user->update([
           
            'emp_id' => $request->input('emp_id'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('maritalstatus'),  
            'mobile' => $request->input('mobile'),
            'alternatemobile' => $request->input('alternatemobile'),
            'aadharno' => $request->input('aadharnumber'),
            'pancardno' => $request->input('pannumber'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country_id'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'pincode' => $request->input('pincode'),
            'permanentaddress' => $request->input('permanentaddress'),
            'pcountry_id' => $request->input('pcountry_id'),
            'pstate_id' => $request->input('pstate_id'),
            'pcity_id' => $request->input('pcity_id'),
            'p_pincode' => $request->input('p_pincode'),
            'company_id' => $request->input('company_id'),
            'department_id' => $request->input('department_id'),
            'designation_id' => $request->input('designation_id'),
            'role_id' => $request->input('role_id'),
            'joindate' => $request->input('joindate'),
            'confirmdate' => $request->input('confirmdate'),
            'exitdate' => $request->input('exitdate'),
            'bankname' => $request->input('bankname'),
            'accountnumber' => $request->input('accountnumber'),
            'ifsccode' => $request->input('ifsccode'),
            'bankaddress' => $request->input('bankaddress'),
        ]);

        // Delete existing education documents
        $user->educationDocuments()->delete();

        // Add new education documents
        foreach ($request->input('document_type') as $index => $documentType) {
            EducationDocument::create([
                'user_id' => $user->id,
                'document_type' => $documentType,
                'document_name' => $request->input('document_name')[$index] ?? '',
                'certificate' => $certificates[$index] ?? '',
            ]);
        }

        $message = 'User updated successfully.';
    } else {
        dd($request->all());
        $user = User::create([   
            'emp_id' => $request->input('emp_id'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('maritalstatus'),  
            'mobile' => $request->input('mobile'),
            'alternatemobile' => $request->input('alternatemobile'),
            'aadharno' => $request->input('aadharnumber'),
            'pancardno' => $request->input('pannumber'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country_id'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'pincode' => $request->input('pincode'),
            'permanentaddress' => $request->input('permanentaddress'),
            'pcountry_id' => $request->input('pcountry_id'),
            'pstate_id' => $request->input('pstate_id'),
            'pcity_id' => $request->input('pcity_id'),
            'p_pincode' => $request->input('p_pincode'),
            'company_id' => $request->input('company_id'),
            'department_id' => $request->input('department_id'),
            'designation_id' => $request->input('designation_id'),
            'role_id' => $request->input('role_id'),
            'joindate' => $request->input('joindate'),
            'confirmdate' => $request->input('confirmdate'),
            'exitdate' => $request->input('exitdate'),
            'bankname' => $request->input('bankname'),
            'accountnumber' => $request->input('accountnumber'),
            'ifsccode' => $request->input('ifsccode'),
            'bankaddress' => $request->input('bankaddress'),
        ]);

        // Add education documents
        foreach ($request->input('document_type') as $index => $documentType) {
            EducationDocument::create([
                'user_id' => $user->id,
                'document_type' => $documentType,
                'document_name' => $request->input('document_name')[$index] ?? '',
                'certificate' => $certificates[$index] ?? '',
            ]);
        }

        $message = 'User created successfully.';
    }

    return redirect()->route('admin.employee')->with('success', $message);
}


}
