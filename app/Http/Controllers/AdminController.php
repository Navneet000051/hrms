<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('admin.superadmindashboard');
    }

    public function admin()
    {
        $data['title'] = 'Admin Dashboard';
        return view('admin.admindashboard');
    }
    public function logout()
    {
        $roleid = auth()->user()->role_id;

        Auth::guard('admin')->logout();
        Session::flash('success', 'Logout successfully.');
        if ($roleid == 1) {
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('user.login');
        }
    }
    // public function adminprofile(Request $request)
    // {
    //     // dd(1);
    //     $output['res'] = 'error';
    //     if (!empty($request->id)) {
    //         $request->validate([
    //             'name' => 'required',
    //             'mobile' => 'required|numeric|digits:10',
    //             'email' => 'required|email',
    //             'address' => 'required',
    //         ]);

    //         $user = User::find($request->id);

    //         if (!$user) {

    //             $output['res'] = 'error';
    //             $output['msg'] = 'User not found';
    //         }

    //         // Update user details
    //         $user->name = $request->input('name');
    //         $user->mobile = $request->input('mobile');
    //         $user->email = $request->input('email');
    //         $user->address = $request->input('address');

    //         if ($user->save()) {
    //             $output['res'] = 'success';
    //             $output['msg'] = 'Profile updated successfully';
    //             $output['redirect'] =  route('admin.adminprofile');
    //         } else {

    //             $output['res'] = 'error';
    //             $output['msg'] = 'Failed to update profile';
    //         }
    //         echo json_encode([$output]);
    //     } elseif (!empty($request->icon)) {
    //         $request->validate([
    //             'icon' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         ]);

    //         $user = auth()->user();

    //         if ($request->hasFile('icon')) {
    //             // Delete the old image if it exists
    //             if ($user->icon) {
    //                 Storage::disk('public')->delete($user->icon);
    //             }
    //             $imagePath = $request->file('icon')->store('admin', 'public');
    //             $user->icon = $imagePath;

    //             if ($user->save()) {
    //                 Session::flash('success', 'Image updated successfully');
    //             } else {
    //                 Session::flash('error', 'Image not updated ');
    //             }
    //         } else {
    //             Session::flash('success', 'No file provided in the request.');
    //         }
    //     }

    //     return view('admin.profile');
    // }

    public function adminprofile(Request $request)
    {
        $output['res'] = 'error';
        if (!empty($request->id)) {
            $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric|digits:10',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($request->id),
                ],
                'address' => 'required',
            ]);
    
            $user = User::find($request->id);
    
            if (!$user) {
                $output['msg'] = 'User not found';
               
            } else {
                // Update user details
                $user->name = $request->input('name');
                $user->mobile = $request->input('mobile');
                $user->email = $request->input('email');
                $user->address = $request->input('address');
               
                if ($user->save()) {
                    $output['res'] = 'success';
                    $output['msg'] = 'Profile updated successfully';
                    $output['redirect'] = route('admin.adminprofile');
                    return json_encode([$output]);
                } else {
                  
                    $output['msg'] = 'Failed to update profile';
                    return json_encode([$output]);
                }
                
            }
           
        } elseif (!empty($request->icon)) {
            $request->validate([
                'icon' => 'image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            ]);
    
            $user = auth()->user();
    
            if ($request->hasFile('icon')) {
                // Delete the old image if it exists
                if ($user->icon) {
                    Storage::disk('public')->delete($user->icon);
                }
                $imagePath = $request->file('icon')->store('admin', 'public');
                $user->icon = $imagePath;

                if ($user->save()) {
                    Session::flash('success', 'Image updated successfully');
                } else {
                    Session::flash('error', 'Image not updated ');
                }
            } else {
                Session::flash('success', 'No file provided in the request.');
            }
        }
        
     
        return view('admin.profile');
    }

    //changepassword
    public function changePasswordShow()
    {
        return view('admin.change-password');
    }
    public function changePassword(Request $request)
    {
        // Validate the request data, including the 'confirmed' rule for 'new-password'
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required',
            'password_confirmation' => 'required|same:new-password',
        ]);

        // Check if the current password matches the authenticated user's password
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The current password does not match
            return redirect()->back()->withInput()->with("error", "Your current password does not match with the password.");
        }

        // Check if the new password is the same as the current password
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password are the same
            return redirect()->back()->withInput()->with("error", "New Password cannot be the same as your current password.");
        }

        // Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));

        // Save the user and check if the save operation was successful
        if ($user->save()) {
            return redirect()->back()->with("success", "Password successfully changed!");
        } else {
            // Handle the case where the save operation fails
            return redirect()->back()->withInput()->with("error", "Failed to change the password. Please try again.");
        }
    }
    
}
