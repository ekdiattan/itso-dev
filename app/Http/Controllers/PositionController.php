<?php

namespace App\Http\Controllers;

use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::all();

        return view('home.master.position.index', ['title' => 'Position', 'position' => $position]);
    }
}
