<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Booking;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home.dashboard', ["title" => "Dashboard"]);
    }
}
