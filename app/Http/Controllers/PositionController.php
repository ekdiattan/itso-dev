<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::all();

        return view('home.master.position.index', ['title' => 'Position', 'position' => $position]);
    }
    
    public function viewEdit(Request $request)
    {
        $id = $request->input('id');
        $position = Position::find($id);

        return view('home.master.position.edit', ['title' => 'Position', 'position' => $position]);
    }
}
