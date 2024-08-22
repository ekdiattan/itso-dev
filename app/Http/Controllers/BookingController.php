<?php

namespace App\Http\Controllers;

use App\Enums\BookingEnum;
use App\Helpers\BookingHelper;
use App\Models\Aset;
use App\Models\Booking;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingHelper;

    public function __construct()
    {
        $this->bookingHelper = new BookingHelper;
    }

    public function index()
    {
        $dalamPengajuan = Booking::where('BookingStatus', 0)->orderBy('BookingCreatedAt', 'desc')->get();

        return view('home.aset.booking.index', ['dalamPengajuan' => $dalamPengajuan, 'title' => 'Booking']);
    }

    public function acc()
    {
        $disetujui = Booking::where('BookingStatus', 1)->orderBy('BookingCreatedAt', 'desc')->get();

        return view('home.aset.booking.acc', ['disetujui' => $disetujui, 'title' => 'Booking']);
    }

    public function reject()
    {
        $ditolak = Booking::where('BookingStatus', 2)->orderBy('BookingCreatedAt', 'desc')->get();

        return view('home.aset.booking.reject', ['ditolak' => $ditolak,  'title' => 'Booking']);
    }

    public function done()
    {
        $selesai = Booking::where('BookingStatus', 3)->orderBy('BookingCreatedAt', 'desc')->get();
        
        return view('home.aset.booking.done', ['selesai' => $selesai, 'title' => 'Booking']);
    }

    public function permohonan()
    {
        $employee = Employee::all();
        $asset = Aset::all();

        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'employee' => $employee,
            'asset' => $asset
        ]);
    }

    public function create()
    {
        $aset = Aset::all();

        return view('home.aset.booking.create', ['title' => 'Peminjaman', 'aset' => $aset]);
    }

    public function edit($id)
    {
        $booking = Booking::find($id);

        $booking->update([
            'BookingApprovalStatus' => BookingEnum::BOOKING,
            'BookingUpdatedBy' => Auth::id(),
            'BookingUpdatedAt' => Carbon::now()
        ]);

        return view('home.aset.booking.edit', ['edit' => $booking, 'title' => 'Booking']);
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
