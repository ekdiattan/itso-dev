<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if($request->search == null)
        {
            $data = DB::table('pegawais')->orderBy('noPegawai', 'asc')->get();
        }else{
            $data = DB::table('pegawais')->where('nama', 'ilike', '%'.$request->search.'%')->orwhere('unitKerja', 'ilike', '%'.$request->search.'%')->get();
        }
        return view('home.kepegawaian.data.master_pegawai.index', compact('data'), [ 'data' => $data, 'title' => 'Pegawai', 'search' => $request->search]);
    }
    public function pnsindex(Request $request)
    {
        
        if($request->search == null){
            $data = DB::table('pegawais')->orderBy('noPegawai', 'asc')->get();
        }else{
            $data = DB::table('pegawais')->where('nama', 'ilike', '%'.$request->search.'%')->orwhere('unitKerja', 'ilike', '%'.$request->search.'%')->get();
        }
        return view('home.kepegawaian.data.master_pegawai.pns', compact('data'), [ 'data' => $data, 'title' => 'Pegawai', 'search' => $request->search]);
    }
    public function nonpnsindex(Request $request)
    {
        
        if($request->search == null){
            $data = DB::table('pegawais')->orderBy('noPegawai', 'asc')->get();
        }else{
            $data = DB::table('pegawais')->where('nama', 'ilike', '%'.$request->search.'%')->orwhere('unitKerja', 'ilike', '%'.$request->search.'%')->get();
        }
        return view('home.kepegawaian.data.master_pegawai.pns', compact('data'), [ 'data' => $data, 'title' => 'Pegawai', 'search' => $request->search]);
    }
}