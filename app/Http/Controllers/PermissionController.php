<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    protected $service;

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        try{

            $user = Auth::user();
            $permissions = $this->service->index($user);

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return view('home.master.permission.index', ['title' => 'Hak Akses', 'permission' => $permissions['permission'], 'module' => $permissions['module'], 'role' => $permissions['role']]);
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
