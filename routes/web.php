<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\changeStatusController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UpdatePositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.layout.login');
// });



Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/superadmin', [AuthController::class, 'superadmin'])->name('superadmin');
        Route::get('/', [AuthController::class, 'index'])->name('login');

        Route::post('/', [AuthController::class, 'login'])->name('logindata');

        Route::get('/registration', [AuthController::class, 'registration'])->name('registration');

        Route::post('/registration', [AuthController::class, 'registrationdata'])->name('registrationdata');
    });
    Route::middleware('admin.auth')->group(function () {

        //Admin Section

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/admindashboard', [AdminController::class, 'admin'])->name('admindashboard');
        Route::get('/adminprofile', [AdminController::class, 'adminprofile'])->name('adminprofile');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::post('/adminprofile', [AdminController::class, 'adminprofile'])->name('updateProfileImg');

        Route::patch('/adminprofile', [AdminController::class, 'adminprofile'])->name('updateProfile');

        Route::post('/changeStatus', [changeStatusController::class, 'changeStatus'])->name('changeStatus');

        Route::get('/holidays', [HolidaysController::class, 'holidays'])->name('holidays');
        Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee');
        Route::get('/leave', [LeaveController::class, 'leave'])->name('leave');
        Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
        Route::get('/role', [RoleController::class, 'role'])->name('role');

        Route::get('/changePassword', [AdminController::class, 'changePasswordShow'])->name('changePassword');

        Route::put('/changePassword', [AdminController::class, 'changePassword'])->name('changePassworddata');

        Route::delete('/deleteData', [deleteController::class, 'destroy'])->name('DeleteData');

        //update position 

        Route::post('/updatePositions', [UpdatePositionController::class, 'index'])->name('updatePositions');
    });
});
