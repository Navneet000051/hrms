<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(){
        return view('admin.company');
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

    // Check if it's an update operation
    if (!empty($request->id)) {
        // Validate the incoming request data
        $request->validate([
            'company_name' => 'required|string|',
            'address' => 'required|string|',
        ]);
        $company= Company::find($request->id);
        if (!empty($company)) {
            $company->update([
               
                'company_name' => $request->company_name,
                'address' => $request->address,
                'logo' => isset($logoPath) ? $logoPath : $company->logo, // Update logo only if a new one is uploaded
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
