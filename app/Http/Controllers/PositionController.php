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

        return view('home.master.position.index', ['title' => 'Jabatan', 'position' => $position]);
    }
    
    public function viewEdit(Request $request)
    {
        try{

            $id = $request->input('id');
            $position = Position::find($id);

        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }

        return view('home.master.position.edit', ['title' => 'Jabatan', 'position' => $position]);
    }

    public function update(Request $request, $id)
    {
        try{

            $position = Position::find($id);
            $position->update($request->all());

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return redirect('/position')->with('success', 'Berhasil Mengupdate Data');
    }

    public function delete(int $id)
    {
        try{

            $position = Position::find($id);
            $position->delete();
            
        }catch(\Exception $e){

            throw new \Exception($e->getMessage());
        }
        
        return redirect('/position')->with('success', 'Berhasil Menghapus Data');
    }
}
