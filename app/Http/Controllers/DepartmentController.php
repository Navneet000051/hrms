<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
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
        $tableName = (new Department)->getTable();
        $data['tablename'] = $tableName;

        if ($id != '') {
            $id = decrypt($id);
            $data['editdepartment'] = Department::where('id', $id)->first();
        } else {
            $data['editdepartment'] = '';
        }

        $data['companies'] = Company::where('status', 1)->get();
        $data['title'] = 'Department';
        $data['departments'] = Department::where('status', 1)->get();

        if ($request->ajax()) {
            $data = Department::with('company') // Load the related company
                ->orderBy('position_by', 'asc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('company_name', function ($row) {
                    return $row->company->company_name; // Access the company name
                })
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
                    $actionBtn = '<a href="' . route('admin.editdepartment', ['id' => $encryptedId]) . '"class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" onclick="deleteData(\'id\', ' . $row->id . ', \'' . $tableName . '\')" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></a>';
                    return $actionBtn;
                })
                ->setRowAttr([
                    'data-id' => function ($row) {
                        return $row->id;
                    },
                ])
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.department', $data);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $total = Department::count();
        $position_by = $total + 1;
        // Handle file upload


        // Check if it's an update operation
        if (!empty($request->id)) {
            // Validate the incoming request data
            $request->validate([
                'company_id' => 'required|numeric|exists:companies,id',
                'department_name' => 'required|string|',
            ]);
            $department = Department::find($request->id);
            if (!empty($department)) {
                $department->update([

                    'department_name' => $request->department_name,
                    'company_id' => $request->company_id,
                ]);
                Session::flash('success', 'Data updated successfully!');
            } else {
                Session::flash('error', 'Company with ID ' . $request->id . ' not found.');
            }
        } else {
            $request->validate([
                'company_id' => 'required|numeric|exists:companies,id',
                'department_name' => 'required|string|',

            ]);
            // Create a new company instance
            $department = new Department();
            $department->company_id = $request->company_id;
            $department->department_name = $request->department_name;
            $department->position_by = $position_by;
            $department->save();
            Session::flash('success', 'Data added successfully!');
        }
        // Redirect back with success or error message
        return redirect()->route('admin.department');
    }
}
