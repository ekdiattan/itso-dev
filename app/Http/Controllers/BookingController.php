<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Aset;
use App\Models\Booking;
use App\Models\Employee;
use App\Enums\BookingEnum;
use Illuminate\Http\Request;
use App\Helpers\BookingHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingHelper;
    public function __construct( ){
        $this->bookingHelper = new BookingHelper();
    }
    public function index ()
    {
        $dalamPengajuan = Booking::where('BookingStatus', 0)->orderBy('BookingCreatedAt', 'desc')->get();
        return view('home.aset.booking.index', ['dalamPengajuan' => $dalamPengajuan, 'title' => 'Booking']);
    }

    public function acc()
    {
        $disetujui = Booking::where('BookingStatus', 1)->orderBy('BookingCreatedAt', 'desc')->get();
        return view('home.aset.booking.acc', ['disetujui'=> $disetujui, 'title' => 'Booking']);
    }

    public function reject()
    {
        $ditolak = Booking::where('BookingStatus', 3)->orderBy('BookingCreatedAt', 'desc')->get();
        return view('home.aset.booking.reject', ['ditolak' => $ditolak,  'title' => 'Booking']);
    }

    public function permohonan()
    {
        $employee = Employee::all();
        $asset = Aset::all();

        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'employee' => $employee,
            'asset' => $asset,
        ]);
    }

    public function booked (Request $request, $id)
    { 
        $aset = Aset::find($id);
        $booked = Aset::find($id)->booked->where('status', '=', 'Disetujui');

        foreach($booked as $book){
            $book->mulai = Carbon::parse($book->mulai)->format('H:i:s, d/m/Y');
            $book->selesai = Carbon::parse($book->selesai)->format('H:i:s, d/m/Y');
        }
        return view('home.aset.booking.booked', ['title' => 'Jadwal', 'aset' => $aset,'bookeds' => $booked]);
    }

    public function result($id)
    {
        $booking = Booking::find($id);
        $booking->tanggalPermohonan = Carbon::parse($booking->tanggalPermohonan)->translatedFormat('d F Y');
        $booking->mulai = Carbon::parse($booking->mulai)->translatedFormat('H:i:s, d F Y');
        $booking->selesai = Carbon::parse($booking->selesai)->translatedFormat('H:i:s, d F Y');
        return view('home.aset.booking.result', ['title' => 'Permohonan', 'data' => $booking]); // bakalan bisa di pisahin
    }
    public function create ()
    {    
        $aset =  Aset::all();
        return view('home.aset.booking.create', ['title' => 'Peminjaman','aset' => $aset]);
    }

    public function show($id)
    {
        $booking= Booking::find($id);
        $booking->mulai = Carbon::parse($booking->mulai)->translatedFormat('H:i, d F Y');
        $booking->selesai = Carbon::parse($booking->selesai)->translatedFormat('H:i, d F Y');
        $booking->tanggalPermohonan = Carbon::parse($booking->tanggalPermohonan)->translatedFormat('d F Y');
        $aset = $booking->aset->first();
        return view('home.aset.booking.show',['booking'=> $booking, 'title' => 'Booking', 'aset' => $aset]);
    }
    public function edit($id)
    {
        $edit= Booking::find($id);
        $edit->mulai = Carbon::parse($edit->BookingStart)->translatedFormat('d F Y');
        $edit->selesai = Carbon::parse($edit->BookingEnd)->translatedFormat('d F Y');
        $edit->tanggalPermohonan = Carbon::parse($edit->BookingCreatedAt)->translatedFormat('d F Y');
        return view('home.aset.booking.edit',['edit'=> $edit, 'title' => 'Booking']);
    }
    public function delete($id)
    {
        $booking = Booking::find($id);
        $user = Auth::id();
        $booking->update(['BookingDeletedBy' => $user]);
        $booking->delete();
        
        session()->flash('success', 'Peminjaman Berhasil dihapus');
        return redirect('/booking')->with('success', 'Peminjaman berhasil dihapus');
    } 

    public function done()
    {
        $done = Booking::where('BookingStatus', 2)->orderBy('BookingCreatedAt', 'desc')->get();
        return view('home.aset.booking.selesai',['title' => 'Booking', 'done' => $done]);
    }

    public function store(Request $request)
    {
        $bookingCode = $this->bookingHelper->createrandobooking(5);

        $booking = Booking::create([
            'BookingCode' => $bookingCode,
            'BookingEmployeeId' => $request->BookingEmployeeId,
            'BookingAsetId' => $request->BookingAsetId,
            'BookingStart' => $request->BookingStart,
            'BookingEnd' => $request->BookingEnd,
            'BookingUsed' => $request->BookingUsed,
            'BookingStatus' => BookingEnum::WAITING,
            'BookingRemark' => $request->BookingRemark ?? null,
            'BookingCreatedBy' => Auth::id(),
            'BookingUpdatedBy' => Auth::id()
           ]);

        return view('home.aset.booking.result', ['title' => 'Permohonan', 'booking' => $booking]);
    }
}
