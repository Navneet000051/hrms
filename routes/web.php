<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\changeStatusController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveQuotaController;
use App\Http\Controllers\LeaveSummaryController;
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

// Route::middleware('superadmin.guest')->group(function () {
//     Route::get('/superadmin', [AuthController::class, 'superadmin'])->name('superadmin');
// });

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('admin.guest')->group(function () {
        Route::get('/superadmin', [AuthController::class, 'superadmin'])->name('superadmin');
        Route::get('/', [AuthController::class, 'index'])->name('login');

        Route::post('/', [AuthController::class, 'login'])->name('logindata');

        Route::get('/registration', [AuthController::class, 'registration'])->name('registration');

        Route::post('/registration', [AuthController::class, 'registrationdata'])->name('registrationdata');
    });
    // Route::middleware('admin.auth')->group(function () {
    //     Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // });
    Route::middleware('admin.auth')->group(function () {

        //Admin Section ===============================================
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/admindashboard', [AdminController::class, 'admin'])->name('admindashboard');
        Route::get('/adminprofile', [AdminController::class, 'adminprofile'])->name('adminprofile');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::post('/adminprofile', [AdminController::class, 'adminprofile'])->name('updateProfileImg');

        Route::patch('/adminprofile', [AdminController::class, 'adminprofile'])->name('updateProfile');
        // change status
        Route::post('/changeStatus', [changeStatusController::class, 'changeStatus'])->name('changeStatus');


        // holidays section ==============================================

        Route::get('/holidays', [HolidaysController::class, 'index'])->name('holidays');

        // employee section ==============================================
        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');

        // leave section ==============================================

        Route::get('/leave', [LeaveController::class, 'index'])->name('leave');

        // leave section ==============================================

        Route::get('/leave', [LeaveController::class, 'index'])->name('leave');
        Route::post('/addleave', [LeaveController::class, 'save'])->name('addleave');
        Route::get('editleave/{id}', [LeaveController::class, 'index'])->name('editleave');


        // leave Quota section ==============================================

        Route::get('/leavequota', [LeaveQuotaController::class, 'index'])->name('leavequota');
        Route::post('/addleavequota', [LeaveQuotaController::class, 'save'])->name('addleavequota');
        Route::get('editleavequota/{id}', [LeaveQuotaController::class, 'index'])->name('editleavequota');

        // leave summary section ==============================================

        Route::get('/leavesummary', [LeaveSummaryController::class, 'index'])->name('leavesummary');

        // attendance section ============================================
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');

        // role section =================================================
        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::post('/addrole', [RoleController::class, 'save'])->name('addrole');
        Route::get('/editrole/{id}', [RoleController::class, 'index'])->name('editrole');
        Route::post('check-role-name', [RoleController::class, 'checkRoleName'])->name('checkRoleName');


        // company section ================================================
        Route::get('/company', [CompanyController::class, 'index'])->name('company');
        Route::get('/editcompany/{id}', [CompanyController::class, 'index'])->name('editcompany');
        Route::post('/addcompany', [CompanyController::class, 'save'])->name('addcompany');

        // department section =============================================
        Route::get('/department', [DepartmentController::class, 'index'])->name('department');
        Route::post('/adddepartment', [DepartmentController::class, 'save'])->name('adddepartment');
        Route::get('/editdepartment/{id}', [DepartmentController::class, 'index'])->name('editdepartment');


        // designation section ============================================
        Route::get('/designation', [DesignationController::class, 'index'])->name('designation');
        Route::post('/adddesignation', [DesignationController::class, 'save'])->name('adddesignation');
        Route::get('/editdesignation/{id}', [DesignationController::class, 'index'])->name('editdesignation');
        Route::get('get-departments', [DesignationController::class, 'getDepartments'])->name('getDepartments');


        // change password =================================================
        Route::get('/changePassword', [AdminController::class, 'changePasswordShow'])->name('changePassword');
        Route::put('/changePassword', [AdminController::class, 'changePassword'])->name('changePassworddata');


        // Delete Data =================================================

        Route::delete('/deleteData', [deleteController::class, 'destroy'])->name('DeleteData');

        //update position ===========================================

        Route::post('/updatePositions', [UpdatePositionController::class, 'index'])->name('updatePositions');
    });
});
