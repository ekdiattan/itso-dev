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
        $this->asetHelper = new AsetHelper;
    }

    public function index()
    {
        try {
            $asets = Aset::all();

            foreach ($asets as $aset) 
            {
                $aset->MasterAsetType = $this->asetHelper->type($aset->MasterAsetType);
            }
            
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.master.aset.index', ['title' => 'Aset', 'asets' => $asets]);
    }

    public function store(Request $request)
    {
        try {

            $asetCodes = $this->asetHelper->generateasetcode($request->MasterAsetBoughtDate, 5);
            Aset::create(['MasterAsetCode' => $asetCodes, $request->all()]);

            $request->accepts('session');
            session()->flash('success', 'Berhasil menambahkan data!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/aset');
    }

    public function edit(Request $request)
    {
        try {

            $id = $request->input('id');
            $aset = Aset::find($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.master.aset.edit', ['aset' => $aset, 'title' => 'Aset']);
    }

    public function update(Request $request, $id)
    {
        try {

            $aset = Aset::find($id);
            $aset->update($request->all());
            $request->accepts('session');
            session()->flash('success', 'Berhasil menambahkan data!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/aset')->with('success', 'Berhasil Mengupdate Data');
    }

    public function destroy(Aset $aset)
    {
        try {

            Aset::destroy($aset->id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/aset')->with('succes', 'Aset has been deleted');
    }
    public function delete($id)
    {
        try {

            $aset = Aset::find($id);
            $aset->delete();
            session()->flash('success', 'Aset Berhasil dihapus');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return redirect('/aset')->with('success', 'Aset berhasil dihapus');
    }
}
