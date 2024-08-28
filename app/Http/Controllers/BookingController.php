<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Enums\BookingEnum;
use App\Helpers\BookingChangeHelper;
use App\Helpers\BookingHelper;
use App\Models\Aset;
use App\Models\Booking;
use App\Models\Employee;
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
        try {

            $dalamPengajuan = Booking::where('BookingStatus', 0)->orderBy('BookingCreatedAt', 'desc')->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.index', ['dalamPengajuan' => $dalamPengajuan, 'title' => 'Booking']);
    }

    public function acc()
    {
        try {
            $disetujui = Booking::where('BookingStatus', 1)->orderBy('BookingCreatedAt', 'desc')->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.acc', ['disetujui' => $disetujui, 'title' => 'Booking']);
    }

    public function reject()
    {
        try {
            $ditolak = Booking::where('BookingStatus', 2)->orderBy('BookingCreatedAt', 'desc')->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return view('home.aset.booking.reject', ['ditolak' => $ditolak,  'title' => 'Booking']);
    }

    public function done()
    {
        try {

            $selesai = Booking::where('BookingStatus', 3)->orderBy('BookingCreatedAt', 'desc')->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.done', ['selesai' => $selesai, 'title' => 'Booking']);
    }

    public function permohonan()
    {
        try {

            $employee = Employee::all();
            $asset = Aset::all();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'employee' => $employee,
            'asset' => $asset
        ]);
    }

    public function create()
    {
        try {

            $aset = Aset::all();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.create', ['title' => 'Peminjaman', 'aset' => $aset]);
    }

    public function edit($id)
    {
        try {

            $booking = Booking::find($id);
            $booking->update([
                'BookingApprovalStatus' => BookingEnum::BOOKING,
                'BookingUpdatedBy' => Auth::id(),
                'BookingUpdatedAt' => Carbon::now()
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.edit', ['edit' => $booking, 'title' => 'Booking']);
    }

    public function delete($id)
    {
        try {
            $booking = Booking::find($id);
            $user = Auth::id();
            $booking->update(['BookingDeletedBy' => $user]);
            $booking->delete();

            session()->flash('success', 'Peminjaman Berhasil dihapus');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/booking')->with('success', 'Peminjaman berhasil dihapus');
    }

    public function store(Request $request)
    {
        try {
            $booking = Booking::where('BookingAsetId', $request->BookingAsetId)->whereBetween('BookingStart', [$request->BookingStart, $request->BookingEnd])->first();

            if ($booking) {
                return back()->with('error', 'Aset sedang dipinjam!');
            }

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
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.result', ['title' => 'Permohonan', 'booking' => $booking]);
    }

    public function show(Request $request)
    {
        try {
            $id = $request->input('id');

            $booking = Booking::find($id);
            $booking->BookingStatus = BookingChangeHelper::changeStatus($booking->BookingStatus);
        } catch (\Exception $e) {
            return redirect('/booking')->with('error', 'Permohonan tidak ditemukan');
        }

        return view('home.aset.booking.show', ['title' => 'Permohonan', 'booking' => $booking]);
    }
}
