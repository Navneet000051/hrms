<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display the role page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $id = '')
    {
        $tableName = (new Roles)->getTable();
        $data['tablename'] = $tableName;
    
        if ($id != '') {
            $id = decrypt($id);
            $data['editrole'] = Roles::where('id', $id)->first();
        } else {
            $data['editrole'] = '';
        }
        
        $data['title'] = 'Roles';
        $data['designations'] = Roles::where('status', 1)->get();
        if ($request->ajax()) {
            $data = Roles::with(['company', 'department']) // Load the related company and department
                ->orderBy('position_by', 'asc')
                ->get();
    
            return DataTables::of($data)
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
                                <div class='dropdown-menu dropdown-menu-end p-2'>
                                    <a class='dropdown-item' style='cursor:pointer;' onclick=\"changeStatus('id', '{$row->id}', 'status', '1', '{$tableName}')\">Active</a>
                                </div>
                            </div>";
                        }
                    })
                    ->addColumn('action', function ($row) use ($tableName) {
                        $encryptedId = encrypt($row->id);
                        $actionBtn = '<a href="' . route('admin.editrole', ['id' => $encryptedId]) . '"class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
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
    
        return view('admin.designation', $data);
    }


       public function save(Request $request){ 
        // dd($request->all());
        $total = Designation::count();
        $position_by = $total + 1;
        // Handle file upload
        // Check if it's an update operation
        if (!empty($request->id)) {
            // Validate the incoming request data
            $request->validate([
                'company_id' => 'required|numeric|exists:companies,id',
                'department_id' => 'required|numeric|exists:departments,id',
                'designation_name' => 'required|string|',
            ]);
            $designation= Roles::find($request->id);
            if (!empty($designation)) {
                $designation->update([
                   
                    'designation_name' => $request->designation_name,
                    'company_id' => $request->company_id,
                    'department_id' => $request->department_id,
                ]);
                Session::flash('success', 'Data updated successfully!');
            } else {
                Session::flash('error', 'Company with ID ' . $request->id . ' not found.');
            }
        } else {
            $request->validate([
                'company_id' => 'required|numeric|exists:companies,id',
                'department_id' => 'required|numeric|exists:departments,id',
                'designation_name' => 'required|string|',
               
            ]);
            // Create a new company instance
            $designation= new Designation();
            $designation->company_id = $request->company_id;
            $designation->department_id = $request->department_id;
            $designation->designation_name = $request->designation_name;
            $designation->position_by = $position_by;
            $designation->save();
            Session::flash('success', 'Data added successfully!');
        }
        // Redirect back with success or error message
        return redirect()->route('admin.designation');
        }

        public function getDepartments(Request $request)
{
    $departments = Roles::where('company_id', $request->company_id)->where('status', 1)->pluck('department_name', 'id');
    return response()->json($departments);
}

}
