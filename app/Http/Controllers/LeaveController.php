<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function leave(){
        return view('admin.leave');
    }
}
