<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.layout.adminlogin');
    }
    public function superadmin()
    {
        return view('admin.layout.login');
    }
    
    public function login(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        $request = Request::capture();
        $uri = $request->path();

        // If you want to get only the last segment of the URI (after the last "/")
        $uriName = last(explode('/', $uri));
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (DB::table('users')->where('email', $request->email)->count() > 0) {

           
            $user = DB::table('users')->where('email', $request->email)->first();
            $status = $user->status;
            // dd($currentRoute);
            if ($status == 1) {
                if($user->role_id == 1 && $currentRoute=='admin.logindata'){
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    Session::flash('success', 'Login successfully.');
                    // dd(1);
                        return redirect()->route('admin.dashboard');
                     
                } else {
                    return redirect()->route($uriName.'superadmin')->withInput($request->only('email'))->with('error', 'Please enter correct password');
                } 
            }
            else if($user->role_id == 2 && $currentRoute=='admin.logindata'){
                // dd(1);
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    Session::flash('success', 'Login successfully.');
                    return redirect()->route('admin.admindashboard');
            } else {
                return redirect()->route('admin.login')->withInput($request->only('email'))->withErrors(['password' => 'Please enter correct password']);
            } 
            }
            else{
                // dd(5);
                return redirect()->route($uriName.'.login')->with('warning', 'Unautherized access');
                // return redirect()->route($uriName.'.login')->withInput($request->only('email'))->with('error', 'unautherized');
            }
        }

            else {
                return redirect()->route($uriName.'.login')->withInput($request->only('email'))->withErrors(['email' => 'Your Account is inactive']);
            }
        } else {
            return redirect()->route($uriName.'.login')->withInput($request->only('email'))->with('error', 'Please enter correct email');
        }
    }
   

}
