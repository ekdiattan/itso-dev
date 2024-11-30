<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aset;
use App\Models\Booking;
use App\Models\Employee;
use App\Enums\BookingEnum;
use Illuminate\Http\Request;
use App\Enums\AsetStatusEnum;
use App\Helpers\BookingHelper;
use App\Helpers\BookingChangeHelper;
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
            $asset = Aset::where('MasterAsetIsActive', AsetStatusEnum::ACTIVE)->get();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'employee' => $employee,
            'asset' => $asset,
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

    public function edit(Request $request)
    {
        try {

            $id = $request->input('id');
            $edit = Booking::find($id);

            if($edit->BookingStatus == 0){
                $status = [
                     1 => 'Setujui',
                     2 => 'Tolak',
                ];
            }elseif($edit->BookingStatus = 1){
                $status = [
                    3 => 'Selesai',
               ];
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.aset.booking.edit', ['edit' => $edit, 'title' => 'Booking', 'status' => $status]);
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

            $booking = Booking::where('BookingAsetId', $request->BookingAsetId)
            ->where(function ($query) use ($request) {
                $query->whereBetween('BookingStart', [$request->BookingStart, $request->BookingEnd])
                      ->orWhereBetween('BookingEnd', [$request->BookingStart, $request->BookingEnd])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('BookingStart', '<=', $request->BookingStart)
                                ->where('BookingEnd', '>=', $request->BookingEnd);
                      });
            })
            ->first();

                    if($request->BookingStart > $request->BookingEnd) {
                return back()->with('error', 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir');
            }

            if ($booking) {

                if ($booking->BookingExpiredAt < Carbon::now()) {

                    return back()->with('badRequest', 'Aset'.' '.$booking->aset->MasterAsetName.' sedang menunggu di konfirmasi oleh Tim Aset dalam waktu 1 X 24 jam!');

                }elseif ($booking->BookingStatus == BookingEnum::BOOKING) {

                    return back()->with('error', 'Aset'.' '.$booking->aset->MasterAsetName.' sedang dalam peminjaman hingga mulai'.$booking->BookingStart.' sampai '.$booking->BookingEnd);
                }
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
                'BookingExpiredAt' => Carbon::parse($request->BookingEnd)->addDays(1),
                'BookingCreatedBy' => Auth::id(),
                'BookingUpdatedBy' => Auth::id()
            ]);

            $booking->BookingStatus = BookingHelper::status($booking->BookingStatus);

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

    public function update(Request $request, $id)
    {
        try {

            $booking = Booking::find($id);
            $booking->update($request->all());

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/booking')->with('success', 'Permohonan Berhasil diupdate');
    }
}
