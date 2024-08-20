<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('register.login');
});

Route::get('/', [TrackingController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete']);
    Route::post('/employee/edit', [EmployeeController::class, 'edit']);
    Route::post('/employee/create', [EmployeeController::class, 'store']);
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);

    Route::get('/index', [UserController::class, 'index']);
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'store_register']);
    Route::get('/register/{id}', [UserController::class, 'show']);
    Route::get('/register/edit/{id}', [UserController::class, 'edit']);
    Route::post('/register/update/{id}', [UserController::class, 'updateByUser']);
    Route::get('/register/delete/{id}', [UserController::class, 'delete']);
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    // booking
    Route::get('/booking/create', [BookingController::class, 'create']);
    Route::post('/booking-check', [BookingController::class, 'bookingCheck']);
    Route::get('/booking/{id}', [BookingController::class, 'show']);
    Route::get('/booking-edit/{id}', [BookingController::class, 'edit']);
    Route::get('/booking-reject', [BookingController::class, 'reject']);
    Route::get('/booking/delete/{id}', [BookingController::class, 'delete']);

    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/booking-reject', [BookingController::class, 'reject']);
    Route::get('/booking-acc', [BookingController::class, 'acc']);
    Route::get('/booking-done', [BookingController::class, 'done']);

    // aset
    Route::get('/aset', [AsetController::class, 'index']);
    Route::post('/aset/create', [AsetController::class, 'store']);
    Route::get('/aset/{id}', [AsetController::class, 'edit']);
    Route::post('/aset/{id}', [AsetController::class, 'update']);
    Route::get('/aset/delete/{id}', [AsetController::class, 'delete']);

    // Position
    Route::get('/position', [PositionController::class, 'index']);

    // Account Setting
    Route::get('/account', [UserController::class, 'editByUser']);
    Route::post('/account/{id}', [UserController::class, 'updateByUser']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    // Unit
    Route::get('/unit', [UnitController::class, 'index']);
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete']);
});

Route::get('/public', [TrackingController::class, 'index']);
Route::get('/tracking', [TrackingController::class, 'track']);
Route::post('/tracking', [TrackingController::class, 'find']);
Route::get('/tracking/{ticket}', [TrackingController::class, 'found']);
Route::get('/pinjam', [TrackingController::class, 'pinjam']);

//permohonan publik
Route::get('/peminjaman', [BookingController::class, 'permohonan']);
Route::get('/permohonan-result/{id}', [BookingController::class, 'result']);
Route::post('/permohonan-check', [BookingController::class, 'permohonanCheck']);
Route::post('/permohonan-store', [BookingController::class, 'store']);
Route::get('/booked/{id}', [BookingController::class, 'booked']);
