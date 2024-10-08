<?php

namespace App\Http\Controllers;

use App\Helpers\EmployeeHelper;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    protected $employeeHelper;

    public function __construct(EmployeeHelper $employeeHelper)
    {
        $this->employeeHelper = $employeeHelper;
    }

    public function index()
    {
        try{

            $employee = Employee::all();
            $position = Position::all();
            $unit = Unit::all();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage(), 500);
        }
        
        return view('home.master.employee.index', ['title' => 'Employee', 'employee' => $employee, 'position' => $position, 'unit' => $unit]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $employeeHelper = $this->employeeHelper->generateNumber(5);

            $dataEmployee = Employee::create([
                'EmployeeAddress' => $request->EmployeeAddress ?? null,
                'EmployeeName' => $request->EmployeeName,
                'EmployeeNumber' => $employeeHelper,
                'EmployeeEmail' => $request->EmployeeEmail,
                'EmployeePhone' => $request->EmployeePhone,
                'EmployeePositionId' => $request->EmployeePositionId,
                'EmployeeGender' => $request->EmployeeGender,
            ]);

            $roleDefault = Role::where('MasterRoleName', 'US')->first();

            User::create([
                'UserEmployeeId' => $dataEmployee['EmployeeId'],
                'UserRoleId' => $roleDefault->MasterRoleId,
                'name' => $this->employeeHelper->generateusername($dataEmployee['EmployeeName']),
                'password' => bcrypt($this->employeeHelper->createPassword()),
                'UserCreatedAt' => now(),
                'UserUpdatedAt' => now(),
                'UserCreatedBy' => Auth::id(),
                'UserUpdatedBy' => Auth::id(),
            ]);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

        return redirect('/employee')->with('success', 'Berhasil Menginput Data');
    }

    public function edit(Request $request)
    {
        try{

            $id = $request->input('id');
            $employee = Employee::find($id);
            $position = Position::all();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return view('home.master.employee.edit', [
            'title' => 'Employee', 
            'employee' => $employee, 
            'position' => $position
        ]);
    }

    public function update(int $id, Request $request)
    {
        try{

            $employee = Employee::find($id);
            $employee->update($request->all());
            
        }catch(\Exception $e){
            return redirect('/employee')->with('error', $e->getMessage());
        }

        return redirect('/employee')->with('success', 'Berhasil Mengupdate Data');
    }
}
