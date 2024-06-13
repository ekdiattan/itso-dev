<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TrackingController extends Controller
{
   

    public function index ()
    {
        return view('home.tracking.index', ['title' => 'Public']);
    }
    
    public function track (Request $request){
        return view('home.tracking.tracking', ['title' => 'Tracking', 'laporan' => null, 'booking' => null, 'keyword' => null]);
    }

    public function laporPermasalahan ()
    {
        return view('home.tracking.laporPermasalahan', ['title' => 'Lapor Permasalahan', 'laporan' => null]);
    }

    public function pinjam ()
    {
        return view('home.tracking.pinjam', ['title' => 'Pinjam', 'laporan' => null]);
    }

    public function tes (Request $request){
        return view('home.tracking.tes', ['title' => 'Pinjam', 'laporan' => null]);
    }

    public function find(Request $request)
    {
        $booking = Booking::where('BookingCode', $request->BookingCode)->first();
        return view('home.tracking.tracking', ['title' => 'Tracking', 'booking' => $booking]);
           
    }

    public function found($ticket){
        if(substr($ticket, 0, 1) == 'L'){
            $result = Laporan::where('tiket', $ticket)->first();
            return view('home.tracking.tracking', [
                'title' => 'Tracking', 'laporan' => $result, 'solusis' => null, 'size' => null, 'users' => null, 'images' => null, 'keyword' => null, 'booking' => null, 'aset' => null
            ]);
        } else if(substr($ticket, 0, 1) == 'B'){
            $result = Booking::where('tiket', $ticket)->first();
            return view('home.tracking.tracking', [
                'title' => 'Tracking', 'laporan' => null, 'solusis' => null, 'size' => null, 'users' => null, 'images' => null, 'keyword' => null, 'booking' => $result, 'aset' => $result->aset->first()
            ]);
        }
        
    }
}
