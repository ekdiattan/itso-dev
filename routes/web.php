<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('register.login');
});

Route::get('/', [TrackingController::class, 'index']);

Route::post('/login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function () 
{

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete']);
    Route::post('/employee/edit', [EmployeeController::class, 'edit']);
    Route::post('/employee/create', [EmployeeController::class, 'store']);
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
    
    Route::middleware(['check.permission:TA'])->group(function () {
        Route::get('/booking', [BookingController::class, 'index']);
    });
    Route::get('/booking/create', [BookingController::class, 'create']);
    Route::post('/booking-check', [BookingController::class, 'bookingCheck']);
    Route::get('/booking-done', [BookingController::class, 'done']);
    Route::post('/booking/detail', [BookingController::class, 'show']);
    Route::post('/booking/edit', [BookingController::class, 'edit']);
    Route::get('/booking/delete/{id}', [BookingController::class, 'delete']);
    Route::post('/booking/update/{id}', [BookingController::class, 'update']);
    Route::get('/booking-acc', [BookingController::class, 'acc']);
    Route::get('/booking-reject', [BookingController::class, 'reject']);

    // Aset
    Route::middleware(['check.permission:AS'])->group(function () {
        Route::get('/aset', [AsetController::class, 'index']);
    });

    Route::post('/aset/create', [AsetController::class, 'store']);
    Route::post('/aset', [AsetController::class, 'edit']);
    Route::post('/aset/{id}', [AsetController::class, 'update']);
    Route::get('/aset/delete/{id}', [AsetController::class, 'delete']);
    
    // Position
    Route::middleware(['check.permission:JB'])->group(function () {
        Route::get('/position', [PositionController::class, 'index']);
    });

    Route::post('/position/edit', [PositionController::class, 'viewEdit']);
    Route::post('/position/update/{id}', [PositionController::class, 'update']);
    Route::get('/position/delete/{id}', [PositionController::class, 'delete']);
    
    // User
    Route::get('/account', [UserController::class, 'editByUser']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/register', [UserController::class, 'register']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user/edit', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/delete/{id}', [UserController::class, 'delete']);

    // Unit
    Route::get('/unit', [UnitController::class, 'index']);
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete']);
    
    // Permission
    Route::middleware(['check.permission:HA'])->group(function () {
        Route::get('/permission', [PermissionController::class, 'index']);
    });
    Route::post('/permission/create', [PermissionController::class, 'store']);
    Route::post('/permission/delete', [PermissionController::class, 'delete']);
    
    // Module
    Route::middleware(['check.permission:MD'])->group(function () {
        Route::get('/module', [ModuleController::class, 'index']);
    });
    Route::post('/module/create', [ModuleController::class, 'store']);
    Route::post('/module/edit', [ModuleController::class, 'edit']);
    Route::post('/module/update/{id}', [ModuleController::class, 'update']);
    Route::post('/module/delete', [ModuleController::class, 'delete']);
});

Route::get('/public', [TrackingController::class, 'index']);
Route::get('/tracking', [TrackingController::class, 'track']);
Route::post('/tracking', [TrackingController::class, 'find']);
Route::get('/tracking/{ticket}', [TrackingController::class, 'found']);
Route::get('/bookings', [TrackingController::class, 'pinjam']);

Route::get('/peminjaman', [BookingController::class, 'permohonan']);
Route::get('/permohonan-result/{id}', [BookingController::class, 'result']);
Route::post('/permohonan-check', [BookingController::class, 'permohonanCheck']);
Route::post('/permohonan-store', [BookingController::class, 'store']);
Route::get('/booked/{id}', [BookingController::class, 'booked']);
