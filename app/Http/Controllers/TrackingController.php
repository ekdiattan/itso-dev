<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('home.tracking.index', ['title' => 'Public']);
    }

    public function track()
    {
        return view('home.tracking.tracking', ['title' => 'Tracking', 'laporan' => null, 'booking' => null, 'keyword' => null]);
    }

    public function laporPermasalahan()
    {
        return view('home.tracking.laporPermasalahan', ['title' => 'Lapor Permasalahan', 'laporan' => null]);
    }

    public function pinjam()
    {
        return view('home.tracking.pinjam', ['title' => 'Pinjam', 'laporan' => null]);
    }

    public function tes(Request $request)
    {
        return view('home.tracking.tes', ['title' => 'Pinjam', 'laporan' => null]);
    }

    public function find(Request $request)
    {
        $booking = Booking::where('BookingCode', $request->BookingCode)->first();

        return view('home.tracking.tracking', ['title' => 'Tracking', 'booking' => $booking]);
    }

    public function found(Request $request)
    {
        $explodePath = explode('/', $request->path());
        $booking = Booking::where('BookingCode', $explodePath[1])->first();

        return view('home.tracking.tracking', ['title' => 'Tracking', 'booking' => $booking]);
    }
}
