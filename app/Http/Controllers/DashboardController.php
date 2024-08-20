<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingWaiting = Booking::where('BookingStatus', 0)->count();
        $bookingBooked = Booking::where('BookingStatus', 1)->count();
        $bookingReject = Booking::where('BookingStatus', 2)->count();
        $bookingDone = Booking::where('BookingStatus', 3)->count();
        
        return view('home.dashboard', ['title' => 'Dashboard', 'employee' => $bookingWaiting, 'bookingWaiting' => $bookingBooked, 'bookingBooked' => $bookingReject, 'bookingReject' => $bookingReject, 'bookingDone' => $bookingDone]);
    }
}
