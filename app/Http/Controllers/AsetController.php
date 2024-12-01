<?php

namespace App\Http\Controllers;

use App\Helpers\AsetHelper;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $asets = Aset::orderBy('MasterAsetIsActive', 'desc')->get();

            foreach ($asets as $aset) {
                $aset->MasterAsetType = $this->asetHelper->type($aset->MasterAsetType);
                $aset->MasterAsetIsActive = $this->asetHelper->status($aset->MasterAsetIsActive);
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

            $data = [
                'MasterAsetCode' => $asetCodes,
                'MasterAsetIsActive' => $request->MasterAsetIsActive,
                'MasterAsetCreatedBy' => Auth::id(),
                'MasterAsetUpdatedBy' => Auth::id(),
            ];

            Aset::create(array_merge($request->all(), $data));
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

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/aset')->with('success', 'Berhasil Mengupdate Data');
    }

    public function delete($id)
    {
        try {

            $aset = Aset::find($id);

            $aset->update(['MasterAsetDeletedBy' => Auth::id()]);

            $aset->delete();

            session()->flash('success', 'Aset Berhasil dihapus');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/aset')->with('success', 'Aset berhasil dihapus');
    }
}
