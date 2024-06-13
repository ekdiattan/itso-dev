<?php

namespace App\Http\Controllers;

use App\Models\MasterApproval;
use Illuminate\Http\Request;

class MasterApprovalController extends Controller
{
    public function index()
    {
        $masterApproval = MasterApproval::all();
        
        return view('home.masterapproval.index', ['title' => 'Approval', 'masterApproval' => $masterApproval]);
    }
}
