<?php

namespace App\Http\Controllers;

use App\Models\LeaveQuota;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LeaveController extends Controller
{
    /**
     * A description of the entire PHP function.
     *
     * @return Some_Return_Value
     */
    public function index(Request $request, $id = '')
    {
        $tableName = (new LeaveQuota())->getTable();
        $data['tablename'] = $tableName;

        if ($id != '') {
            $id = decrypt($id);
            $data['editleave'] = LeaveQuota::where('id', $id)->first();
        } else {
            $data['editleave'] = '';
        }

        $data['leavequotas'] = LeaveQuota::where('status', 1)->get();
        $data['title'] = 'Department';

        if ($request->ajax()) {
            $data = LeaveQuota::with('company')->orderBy('position_by', 'asc')->get();

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
        return view('admin.leave', $data);
    }
}
