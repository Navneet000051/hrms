<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    public function holidays(){
        return view('admin.holidays');
    }
}
