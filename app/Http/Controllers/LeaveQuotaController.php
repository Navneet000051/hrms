<?php

namespace App\Http\Controllers;

use App\Models\LeaveQuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class LeaveQuotaController extends Controller
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
         $tableName = (new LeaveQuota)->getTable();
         $data['tablename'] = $tableName;

         if ($id != '') {
             $id = decrypt($id);
             $data['editleavequota'] = LeaveQuota::where('id', $id)->first();
         } else {
             $data['editleavequota'] = '';
         }

         $data['title'] = 'Designation';
         $data['leavequotas'] = LeaveQuota::where('status', 1)->get();
         if ($request->ajax()) {
             $data = LeaveQuota::orderBy('position_by', 'asc')->get();

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
                                 <div class='dropdown-menu dropdown-menu-end'>
                                     <a class='dropdown-item' style='cursor:pointer;' onclick=\"changeStatus('id', '{$row->id}', 'status', '1', '{$tableName}')\">Active</a>
                                 </div>
                             </div>";
                         }
                     })
                     ->addColumn('action', function ($row) use ($tableName) {
                         $encryptedId = encrypt($row->id);
                         $actionBtn = '<a href="' . route('admin.editleavequota', ['id' => $encryptedId]) . '"class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
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

         return view('admin.leavequota', $data);
     }

     public function save(Request $request){
         // dd($request->all());
         $total = LeaveQuota::count();
         $position_by = $total + 1;
         // Handle file upload
         // Check if it's an update operation
         if (!empty($request->id)) {
             // Validate the incoming request data
             $request->validate([
                 'leavetype' => 'required|string|',
                 'duration' => 'required|numeric|min:1', // Validation for duration
             ]);
             $leavequota= LeaveQuota::find($request->id);
             if (!empty($leavequota)) {
                 $leavequota->update([

                     'leavetype' => $request->leavetype,
                     'duration' => $request->duration,
                 ]);
                 Session::flash('success', 'Data updated successfully!');
             } else {
                 Session::flash('error', 'Company with ID ' . $request->id . ' not found.');
             }
         } else {
             $request->validate([
                'leavetype' => 'required|string|',
                'duration' => 'required|numeric|min:1', // Validation for duration

             ]);
             // Create a new company instance
             $leavequota= new LeaveQuota();
             $leavequota->leavetype = $request->leavetype;
             $leavequota->duration = $request->duration;
             $leavequota->position_by = $position_by;
             $leavequota->save();
             Session::flash('success', 'Data added successfully!');
         }
         // Redirect back with success or error message
         return redirect()->route('admin.leavequota');
         }


 }

