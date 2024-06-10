<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $module = Module::all();
        return view('home.master.bidang.index', ['module'=> $module, 'title' => 'Bidang']);
    }
    public function create()
    {
        return view('home.master.bidang.create', ['title' => 'Bidang']);
    }
    public function store(Request $request)
    {
        Bidang::create($request->all());
        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('/bidang');
    }
    public function show($id)
    {
        $bidang = Bidang::find($id);
        Bidang::find($id);
        
        return view('home.master.bidang.edit',['bidangs'=> $bidang,'data'=> $bidang, 'title' => 'Bidang']);
    }
    public function update(Request $request, $id)
    {
        $bidang = Bidang::find($id);
        $bidang->update($request->all());
        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return redirect('/bidang')->with('success', 'Berhasil Mengupdate Data');
    }

    public function destroy(Bidang $bidang)
    {
        Bidang::destroy($bidang->id);
        return redirect('/bidang')->with('succes', 'Bidang has been deleted');
    }
    public function delete($id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();
        $id->accepts('session');
        session()->flash('success', 'Bidang Berhasil dihapus');
        
        return redirect('/bidang')->with('success', 'Bidang berhasil dihapus');
    }
}