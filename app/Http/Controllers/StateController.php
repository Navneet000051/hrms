<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getstates(Request $request)
    {
        $cities = state::where('country_id', $request->country_id)
                                  ->where('status', 1)
                                  ->pluck('name', 'id');
        return response()->json($cities);
    }
}
