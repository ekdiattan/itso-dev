<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        return view('home.master.bidang.index', ['title' => 'Unit', 'unit' => $unit]);
    }

    public function delete(Request $request)
    {
        $unit = Unit::find($request->id);

        $unit->update([
            'MasterUnitDeletedBy' => Auth::id()      
        ]);

        $unit->delete();

        return redirect('/unit')->with('success', 'Data Berhasi Dihapus');
    }
}
