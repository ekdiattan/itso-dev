<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Employee::count();
        $bookingOverdue = Booking::where('BookingStatus', 0)->count();
        $bookingNow = Booking::where('BookingStatus', 1)->count();
        return view('home.dashboard', ["title" => "Dashboard", "employee" => $employee, "bookingOverdue" => $bookingOverdue, "bookingNow" => $bookingNow]);
    }
}
