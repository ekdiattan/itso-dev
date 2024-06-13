<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\LiburController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PulangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\RekapUnitController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\RekapMasukController;
use App\Http\Controllers\RekapPulangController;
use App\Http\Controllers\PengecualianPegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('register.login');
});

Route::get('/',[TrackingController::class, 'index']);
Route::get('/login',[UserController::class, 'login']);
Route::post('/login',[UserController::class, 'authenticate']);

Route::group(['middleware' =>[ 'auth' ]], function(){

Route::get('/employee',[EmployeeController::class, 'index']);

Route::get('/index',[UserController::class, 'index']);
Route::get('/register',[UserController::class, 'register']);
Route::post('/register',[UserController::class, 'store_register']);
Route::get('/register/{id}', [UserController::class, 'show']);
Route::get('/register/edit/{id}', [UserController::class,'edit']);
Route::post('/register/update/{id}', [UserController::class,'updateByUser']);
Route::get('/register/delete/{id}',[UserController::class, 'delete']);

Route::get('/dashboard',[DashboardController::class, 'index']);

// booking
Route::get('/booking/create',[BookingController::class, 'create']);
Route::post('/booking-check',[BookingController::class, 'bookingCheck']);
Route::post('/booking-store',[BookingController::class, 'buat']);
Route::get('/booking/{id}',[BookingController::class, 'show']);
Route::get('/booking-edit/{id}',[BookingController::class, 'edit']);
Route::get('/booking-reject',[BookingController::class, 'reject']);
Route::post('/booking-update/{id}',[BookingController::class, 'update']);
Route::get('/booking/delete/{id}',[BookingController::class, 'delete']);

Route::get('/booking',[BookingController::class, 'index']);
Route::get('/booking-reject',[BookingController::class, 'reject']);
Route::get('/booking-acc',[BookingController::class, 'acc']);
Route::get('/booking-done',[BookingController::class, 'done']);

// aset
Route::get('/aset',[AsetController::class, 'index']);
Route::post('/aset/create',[AsetController::class, 'store']);
Route::get('/aset/{id}', [AsetController::class,'edit']);
Route::post('/aset/{id}', [AsetController::class,'update']);
Route::get('/aset/delete/{id}',[AsetController::class, 'delete']);

// Module 
Route::get('/module', [ModuleController::class, 'index']);
//bidang
Route::get('/module', [ModuleController::class, 'index']);
Route::post('/module/create',[ModuleController::class, 'store']);
Route::get('/module/{id}', [ModuleController::class,'edit']);
Route::post('/module/{id}', [ModuleController::class,'update']);
Route::get('/module/delete/{id}',[ModuleController::class, 'delete']);

// Position
Route::get('/position', [PositionController::class, 'index']);
// Account Setting 
Route::get('/account/{id}', [UserController::class, 'editByUser']);
Route::post('/account/{id}', [UserController::class, 'updateByUser']);
Route::post('/change-password', [UserController::class, 'changePassword']);
Route::get('/maintenance', [UserController::class, 'maintenance']);
Route::get('/fiturmaintenance', [UserController::class, 'fiturmaintenance']);

Route::get('/satuan', [SatuanController::class, 'index']);
Route::post('/satuan/create',[SatuanController::class, 'store']);
Route::get('/satuan/{id}', [SatuanController::class,'edit']);
Route::post('/satuan/{id}', [SatuanController::class,'update']);
Route::get('/satuan/delete/{id}',[SatuanController::class, 'delete']);

Route::get('/keamanan', [BookingController::class, 'beranda']);
Route::get('/keamanan-riwayat', [BookingController::class, 'riwayat']);
Route::get('/keamanan-riwayatdetail/{id}',[BookingController::class, 'riwayatdetail']);
Route::get('/keamanan/{id}',[BookingController::class, 'detail']);
Route::get('/keamanan-edit/{id}',[BookingController::class, 'edt']);
Route::get('/keamanan-proses/{id}',[BookingController::class, 'proses']);
Route::post('/keamanan-upd/{id}',[BookingController::class, 'upd']);
Route::post('/keamanan-prs/{id}',[BookingController::class, 'updproses']);

Route::get('/kepegawaian/kehadiran', [KehadiranController::class, 'index']); 
Route::get('/kepegawaian/kehadiran', [KehadiranController::class, 'show']);
Route::get('/store/kehadiran', [KehadiranController::class, 'store']);
Route::get('/terlambat-harian',[KehadiranController::class, 'belum_absendet']);

// Masuk
Route::get('/absen-masuk', [MasukController::class, 'index']);
Route::get('/store-masuk', [MasukController::class, 'store']);
Route::get('/masuk-export', [MasukController::class, 'export']);

// Pulang
Route::get('/absen-pulang', [PulangController::class, 'index']);
Route::get('/store-pulang', [PulangController::class, 'store']);
Route::get('/pulang-export', [PulangController::class, 'export']);

//PEGAWAI
Route::get('/master-pegawai', [PegawaiController::class, 'index']);
Route::get('/tambah-data-pegawai', [PegawaiController::class, 'create']);
Route::post('/store-data-pegawai', [PegawaiController::class, 'store']);
Route::get('/update-data-pegawai', [PegawaiController::class, 'update']);
Route::get('/delete{id}', [PegawaiController::class, 'delete']);
Route::get('/pns', [PegawaiController::class, 'pnsindex']);
Route::get('/nonpns', [PegawaiController::class, 'nonpnsindex']);

// exception pegawai
Route::get('/pengecualian', [PengecualianPegawaiController::class, 'index']);
Route::post('/insert-pengecualian', [PengecualianPegawaiController::class, 'insert']);
Route::get('/update-pengecualian/{id}', [PengecualianPegawaiController::class, 'edit']);
Route::post('/update-pengecualian/{id}', [PengecualianPegawaiController::class, 'update']);
Route::get('/delete-pengecualian/{id}', [PengecualianPegawaiController::class, 'delete']);

// libur
Route::get('/libur', [LiburController::class, 'index']);
Route::post('/libur/create',[LiburController::class, 'store']);
Route::get('/libur/{id}', [LiburController::class,'edit']);
Route::post('/libur/{id}', [LiburController::class, 'update']);
Route::get('/libur/delete/{id}',[LiburController::class, 'delete']);

Route::get('/change', function () {return view('home/settings/change');});
Route::get('/settings', function () {return view('home/settings/settings');});
Route::get('/light', function () {return view('home/settings/light');});

});

// ROUTE UNTUK PUBLIC
Route::get('/public',[TrackingController::class, 'index']);
Route::get('/tracking',[TrackingController::class, 'track']);
Route::post('/tracking',[TrackingController::class, 'find']);
Route::get('/tracking/{ticket}',[TrackingController::class, 'found']);
Route::get('/laporPermasalahan',[TrackingController::class, 'laporPermasalahan']);
Route::get('/pinjam',[TrackingController::class, 'pinjam']);
Route::post('/upload-surat/{id}',[TrackingController::class, 'unggah']);

Route::get('/block',[BlockController::class, 'block']);
Route::get('/tes',[TrackingController::class, 'tes']);
Route::get('/booking-export/{id}', [BookingController::class, 'export']);

//permohonan publik
Route::get('/peminjaman',[BookingController::class, 'permohonan']);
Route::get('/permohonan-result/{id}',[BookingController::class, 'result']);
Route::post('/permohonan-check',[BookingController::class, 'permohonanCheck']);
Route::post('/permohonan-store',[BookingController::class, 'store']);
Route::get('/booked/{id}',[BookingController::class, 'booked']);