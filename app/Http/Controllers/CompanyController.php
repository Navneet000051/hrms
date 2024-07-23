<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
 
    public function index(Request $request, $id = '')
{
    $tableName = (new Company)->getTable();
    $data['tablename'] = $tableName;

    if ($id != '') {
        $id = decrypt($id);
        $data['editcompany'] = Company::where('id', $id)->first();
        return view('admin.companymodel', $data);
    } else {
        $data['editcompany'] = '';
    }
   
    $data['title'] = 'company';
    $data['company'] = Company::where('status', 1)->get();
  
    if ($request->ajax()) {
        $data = Company::orderBy('position_by', 'asc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) use ($tableName) {
                    if ($row->status == 1) {
                        return "<div class='dropdown d-inline-block user-dropdown'>
                            <button type='button' class='btn text-dark waves-effect' id='page-header-user-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <div class='badge bg-success-subtle text-success font-size-12'><i class='fa fa-spin fa-spinner' style='display:none' id='PendingSpin{$row->id}'></i>Active</div>
                                <i class='fa fa-angle-down'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end p-2'>
                                <a class='dropdown-item' style='cursor:pointer;' onclick=\"changeStatus('id', '{$row->id}', 'status', '0', '{$tableName}')\">Inactive</a> 
                            </div>


                        </div>";
                    } else {
                        return "<div class='dropdown d-inline-block user-dropdown'>
                            <button type='button' class='btn text-dark waves-effect' id='page-header-user-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='d-xl-inline-block ms-1'>
                                    <div class='badge bg-danger-subtle text-danger font-size-12'><i class='fa fa-spin fa-spinner' style='display:none' id='publicationSpin{$row->id}'></i>Inactive</div>
                                </span>
                                <i class='fa fa-angle-down'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end'>
                                <a class='dropdown-item' style='cursor:pointer;' onclick=\"changeStatus('id', '{$row->id}', 'status', '1', '{$tableName}')\">Active</a>
                            </div>
                        </div>";
                    }
                })
                ->addColumn('action', function ($row) use ($tableName) {
                    $encryptedId = encrypt($row->id);
                    $actionBtn = '<a href="javascript:void(0)"  onclick="showEdit(\'' . $encryptedId . '\')"  class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                                  <a href="javascript:void(0)"  onclick="deleteData(\'id\', ' . $row->id . ', \'' . $tableName . '\')" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></a>';
                    return $actionBtn;
                    
                })
                ->addColumn('logo', function ($row) {
                    $actionBtn = '	<a href="' . asset("storage/{$row->logo}") . '" target="_blank"><img src="' . asset("storage/{$row->logo}") . '" width="80"></a>';
                    return $actionBtn;
                })
                ->setRowAttr([
                    'data-id' => function ($row) {
                        return $row->id;
                    },
                ])
                ->rawColumns(['status', 'action','logo'])
                ->make(true);
    }

    return view('admin.company', $data);
}


    public function save(Request $request){ 
    // dd($request->all());
    $total = Company::count();
    $position_by = $total + 1;
    // Handle file upload
    if ($request->hasFile('logo')) {
      
        $logoPath = $request->file('logo')->store('company', 'public');

        // Delete the old logo if updating an existing record
        if (!empty($request->id)) {
            $company = Company::find($request->id);
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
        }
    }
    // dd($logoPath);
    // Check if it's an update operation
    if (!empty($request->id)) {
        // Validate the incoming request data
        $request->validate([
            'company_name' => 'required|string|',
            'address' => 'required|string|',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048', 
        ]);
        $company= Company::find($request->id);
        if (!empty($company)) {
            $company->update([
               
                'company_name' => $request->company_name,
                'address' => $request->address,
                'logo' => isset($logoPath) ? $logoPath : 'blank', // Update logo only if a new one is uploaded
            ]);
            Session::flash('success', 'Data updated successfully!');
        } else {
            Session::flash('error', 'Company with ID ' . $request->id . ' not found.');
        }
    } else {
        $request->validate([
            'company_name' => 'required|string|',
            'address' => 'required|string|',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // Assuming logo uploads
           
        ]);
        // Create a new company instance
        $company= new Company();
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->logo = $logoPath; // Assuming you have a 'logo' field in your 'company' table
        $company->position_by = $position_by;
        $company->save();
        Session::flash('success', 'Data added successfully!');
    }
    // Redirect back with success or error message
    return redirect()->route('admin.company');
    }
}
