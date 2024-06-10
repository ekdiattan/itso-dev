<?php

namespace App\Http\Controllers;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('home.master.employee.index',[ 'title' => 'Employee', 'employee' => $employee]);
    }
}
