<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Position;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        try{

            $permission = Permission::all();
            $module = Module::all();
            $role = Role::all();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return view('home.master.permission.index', ['title' => 'Hak Akses', 'permission' => $permission, 'module' => $module, 'role' => $role]);
    }
    public function store(Request $request)
    {
        try{

            Permission::create($request->all());

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }
    public function show()
    {
        try{

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function update()
    {
        try{

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function delete(Request $request)
    {
        try{

            $id = $request->input('id');
            Permission::find($id)->delete();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
