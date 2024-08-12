<?php

namespace App\Http\Controllers;

use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $module = Module::all();

        return view('home.master.module.index', ['module' => $module, 'title' => 'Module']);
    }

    public function create()
    {
        return view('home.master.bidang.create', ['title' => 'Module']);
    }

    public function edit(int $id)
    {
        $module = Module::find($id);

        return view('home.master.module.edit', ['title' => 'Module', 'module' => $module]);
    }
}
