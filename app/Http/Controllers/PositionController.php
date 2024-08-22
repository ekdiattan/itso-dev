<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        try{

            $position = Position::all();

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

        return view('home.master.position.index', ['title' => 'Position', 'position' => $position]);
    }
    
    public function viewEdit(Request $request)
    {
        $id = $request->input('id');
        $position = Position::find($id);
        
        return view('home.master.position.edit', ['title' => 'Position', 'position' => $position]);
    }

    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        $position->update($request->all());
        
        return redirect('/position')->with('success', 'Berhasil Mengupdate Data');
    }

    public function delete(int $id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect('/position')->with('success', 'Berhasil Menghapus Data');
    }
}
