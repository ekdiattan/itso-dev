<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function index()
    {
        try{

            $module = Module::all();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
        
        return view('home.master.module.index', ['title' => 'Modul', 'module' => $module]);
    }
    public function store(Request $request)
    {
        try{
            
            $validator = Validator::make($request->all(), 
            [
                'MasterModuleName' => ['unique:MasterModule,MasterModuleName']
            ]);

            if ($validator->fails()) {
                return back()->with('badRequest', 'Module sudah ada !');
            }

            Module::create($request->all());

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        try{

            $id = $request->input('id');
            Module::find($id)->update($request->all());

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return back()->with('success', 'Data Berhasil Diupdate');
    }
    public function delete(Request $request)
    {
        try{

            $id = $request->input('id');
            $module = Module::find($id);
            $module->delete();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
