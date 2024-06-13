<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aset;
use App\Models\Bidang;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Pegawai;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index (Request $request)
    {
        if($request->search == null)
        {
            $dalamPengajuan = Booking::where('BookingStatus', 0)->orderBy('BookingCreatedAt', 'desc')->get();
        } else {
            $dalamPengajuan = Booking::where('BookingStatus', 0)->where('BookingCode', 'ilike', '%'.$request->search.'%')->get();
        }
        
        foreach($dalamPengajuan as $result)
        {
            // $result->BookingCreatedAt = Carbon::parse($result->BookingCreatedAt)->translatedFormat('d F Y');
            // $result->BookingStart = Carbon::parse($result->BookingStart)->translatedFormat('H:i:s, d F Y');
            // $result->BookingEnd = Carbon::parse($result->BookingEnd)->translatedFormat('H:i:s, d F Y');
        }
        return view('home.aset.booking.index', ['dalamPengajuan' => $dalamPengajuan, 'title' => 'Booking', 'search' => $request->search]);
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
        // $bidang = Bidang::all();
        // $pegawai = Pegawai::all();
        // $aset =  Aset::all();
        // $booked = Booking::select('aset_id', 'mulai', 'selesai')->where('status', '=', 'Disetujui')->get();
        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'employee' => $employee,
            'asset' => $asset,
        ]);
    }

    public function permohonanCheck (Request $request){
        $periodNew = CarbonPeriod::create($request->mulai, $request->selesai);
        $bidang = Bidang::all();
        $pegawai = Pegawai::all();
        $asets =  Aset::select('*')->where('status', 'tersedia')->where('jenis', $request->jenisAset)->get();
        $asetFiltered = array();
        
        foreach($asets as $result){ // looping aset
            array_push($asetFiltered, $result);
            foreach($result->booked as $book){ // looping booked per aset
                if($book->status == 'Disetujui'){
                    $periodOld = CarbonPeriod::create($book->mulai, $book->selesai);
                    if($periodOld->overlaps($periodNew)){ // terdapat konflik waktu
                        unset($asetFiltered[$result->id-1]); // ini hanya berlaku ketika id dari aset berurutan
                        break;
                    }
                }
            }
        }

        $booked = Booking::select('aset_id', 'mulai', 'selesai')->where('status', '=', 'Disetujui')->get();
        return view('home.aset.booking.permohonan', [
            'title' => 'Permohonan Peminjaman',
            'aset' => $asetFiltered,
            'bidang' => $bidang,
            'pegawais' => $pegawai,
            'booked' => $booked,
            'before' => $request->all()
        ]);
    }

    public function booked (Request $request, $id){ // show booked schedule for an aset
        $aset = Aset::find($id);
        $booked = Aset::find($id)->booked->where('status', '=', 'Disetujui');
        // change datetime format
        foreach($booked as $book){
            $book->mulai = Carbon::parse($book->mulai)->format('H:i:s, d/m/Y');
            $book->selesai = Carbon::parse($book->selesai)->format('H:i:s, d/m/Y');
        }
        return view('home.aset.booking.booked', ['title' => 'Jadwal', 'aset' => $aset,'bookeds' => $booked]);
    }

    public function result($id){
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
    public function bookingCheck(Request $request)
    {
        $pegawai = Pegawai::all();
        $bidang = Bidang::all();
        $aset =  Aset::select('*')->where('status', 'tersedia')->where('jenis', $request->jenisAset)->get();
        return view('home.aset.booking.create', [
            'title' => 'Peminjaman',
            'aset' => $aset,
            'bidang' => $bidang, 
            'pegawais' => $pegawai,
            'before' => $request->all()
        ]);
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
        $aset = $edit->aset;
        $edit->mulai = Carbon::parse($edit->mulai)->translatedFormat('H:i, d F Y');
        $edit->selesai = Carbon::parse($edit->selesai)->translatedFormat('H:i, d F Y');
        $edit->tanggalPermohonan = Carbon::parse($edit->tanggalPermohonan)->translatedFormat('d F Y');
        return view('home.aset.booking.edit',['edit'=> $edit, 'title' => 'Booking', 'aset' => $aset]);
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

    // Keamanan
    public function beranda(Request $request){ // mesti di filter
        // dd(Booking::all());
        if($request->search == null){
            $disetujui = Booking::where('status', 'Disetujui')->orderBy('tiket', 'desc')->get();
            $dipinjam = Booking::where('status', 'Dipinjam')->orderBy('tiket', 'desc')->get();
        } else {
            $disetujui = DB::table('bookings')->where('status', 'Disetujui')->where('namaPemohon', 'ilike', '%'.$request->search.'%')->orwhere('bidang', 'ilike', '%'.$request->search.'%')->orwhere('tanggalPermohonan', 'ilike', '%'.$request->search.'%');
            $dipinjam = DB::table('bookings')->where('status', 'Dipinjam')->where('namaPemohon', 'ilike', '%'.$request->search.'%')->orwhere('bidang', 'ilike', '%'.$request->search.'%')->orwhere('tanggalPermohonan', 'ilike', '%'.$request->search.'%')->orderBy('tiket', 'desc')->get();
        }
        // convert time format
        foreach($dipinjam as $result){
            $result->mulai = Carbon::parse($result->mulai)->translatedFormat('d F Y');
        }
        foreach($disetujui as $result){
            $result->mulai = Carbon::parse($result->mulai)->translatedFormat('d F Y');
        }
        return view('home.keamanan.index',['title' => 'Kendaraan','disetujui' => $disetujui,'dipinjam' => $dipinjam]);
    }

    public function riwayat(Request $request){
        if($request->search == null){
            $selesai = DB::table('bookings')->where('status', 'Selesai')->orderBy('tiket', 'desc')->get();
        } else {
            $selesai = DB::table('bookings')->where('status', 'Selesai')->where('namaPemohon', 'ilike', '%'.$request->search.'%')->orwhere('bidang', 'ilike', '%'.$request->search.'%')->orwhere('tanggalPermohonan', 'ilike', '%'.$request->search.'%')->orderBy('tiket', 'desc')->get();
        }
        return view('home.keamanan.riwayat',['title' => 'Kendaraan','selesai' => $selesai,]);
    }

    public function riwayatdetail($id){
        $booking= Booking::find($id);
        $aset = $booking->aset;
        return view('home.keamanan.riwayatdetail',['booking'=> $booking, 'title' => 'Kendaraan', 'aset' => $aset]);
    }

    public function detail($id){
        $booking= Booking::find($id);
        $aset = $booking->aset;
        return view('home.keamanan.show',['booking'=> $booking, 'title' => 'Kendaraan', 'aset' => $aset]);
    }

    public function edt($id){
        $edit= Booking::find($id);
        $aset = $edit->aset;
        return view('home.keamanan.edit',['edit'=> $edit, 'title' => 'Kendaraan', 'aset' => $aset]);
    }
    public function proses($id){
        $edit= Booking::find($id);
        $aset = $edit->aset;
        return view('home.keamanan.proses',['edit'=> $edit, 'title' => 'Kendaraan', 'aset' => $aset]);
    }

    public function upd(Request $request, $id){ 
        $booking= Booking::find($id);
        $booking->update([
            'kebersihan' => $request->kebersihan,
            'bahanBakar' => $request->bahanBakar,
            'keterangan' => $request->keterangan
        ]);
        
        $aset = Aset::find($booking->aset_id);
        $aset->update([
            'kebersihan' => $request->kebersihan,
            'bahanBakar' => $request->bahanBakar,
            'keterangan' => $request->keterangan
        ]);
        session()->flash('success', 'Berhasil mengupdate data!');
        return redirect('/keamanan/'.$id);
    }

    public function done()
    {
        $done = Booking::where('BookingStatus', 2)->orderBy('BookingCreatedAt', 'desc')->get();
        return view('home.aset.booking.selesai',['title' => 'Booking', 'done' => $done]);
    }
}
