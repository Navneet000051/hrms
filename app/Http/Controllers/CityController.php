<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getcities(Request $request)
    {
        $cities = city::where('state_id', $request->state_id)
                                  ->where('status', 1)
                                  ->pluck('name', 'id');
        return response()->json($cities);
    }
}
