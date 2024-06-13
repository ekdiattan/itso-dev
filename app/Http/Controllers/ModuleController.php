<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $module = Module::all();
        return view('home.master.module.index', ['module'=> $module, 'title' => 'Module']);
    }
    public function create()
    {
        return view('home.master.bidang.create', ['title' => 'Bidang']);
    }
}