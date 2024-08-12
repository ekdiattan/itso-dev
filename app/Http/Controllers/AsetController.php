<?php

namespace App\Http\Controllers;

use App\Helpers\AsetHelper;
use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    protected $asetHelper;

    public function __construct()
    {
        $this->asetHelper = new AsetHelper();
    }

    public function index()
    {   
        $aset = Aset::all();
         return view('home.master.aset.index', ['title' => 'Aset', 'asets'=> $aset]);
    }
    
    public function store(Request $request)
    {
        $asetCodes = $this->asetHelper->generateasetcode($request->MasterAsetBoughtDate,5);
        Aset::create([ 'MasterAsetCode' => $asetCodes ,$request->all()]);
        
        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return redirect('/aset');
    }
    public function edit($id)
    {
        $aset = Aset::find($id);
        return view('home.master.aset.edit',['aset'=> $aset, 'title' => 'Aset']);
    }

    public function update(Request $request, $id)
    {
        $aset = Aset::find($id);
        $aset->update($request->all());
        
        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return redirect('/aset')->with('success', 'Berhasil Mengupdate Data');
    }

    public function destroy(Aset $aset)
    {
        Aset::destroy($aset->id);
        return redirect('/aset')->with('succes', 'Aset has been deleted');
    }

    // delete
    public function delete($id)
    {
        $aset = Aset::find($id);
        $aset->delete();
        session()->flash('success', 'Aset Berhasil dihapus');
        
        return redirect('/aset')->with('success', 'Aset berhasil dihapus');
    }
}
