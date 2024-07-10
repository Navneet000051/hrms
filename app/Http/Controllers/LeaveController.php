<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * A description of the entire PHP function.
     *
     * @return Some_Return_Value
     */
    public function index(){
        return view('admin.leave');
    }
}
