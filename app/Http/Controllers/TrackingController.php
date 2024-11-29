<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Helpers\BookingChangeHelper;

class TrackingController extends Controller
{
    public function index()
    {
        return view('home.tracking.index', ['title' => 'Public']);
    }

    public function track(Request $request)
    {
        $booking = Booking::where('BookingCode')->first();

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

    public function find(Request $request)
    {
        try{

            $booking = Booking::where('BookingCode', $request->BookingCode)->first();

            if($booking == null){
                return back()->with('badRequest', 'Permohonan tidak ditemukan');
            }

            $booking->BookingStatus = BookingChangeHelper::changeStatus($booking->BookingStatus);
            $alertColor = BookingChangeHelper::alertColor($booking->BookingStatus);

        }catch(\Exception $e){
            return back()->with('badRequest', $e->getMessage());
        }
        
        return view('home.tracking.tracking', ['title' => 'Tracking', 'booking' => $booking, 'alertColor' => $alertColor]);
    }

    public function found(Request $request)
    {
        $explodePath = explode('/', $request->path());
        $booking = Booking::where('BookingCode', $explodePath[1])->first();

        return view('home.tracking.tracking', ['title' => 'Tracking', 'booking' => $booking]);
    }
}
