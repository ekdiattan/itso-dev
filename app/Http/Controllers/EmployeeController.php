<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Helpers\EmployeeHelper;
use App\Models\Role;

class EmployeeController extends Controller
{
    protected $employeeHelper;
    public function __construct( EmployeeHelper $employeeHelper)
    {
        $this->employeeHelper = $employeeHelper;
    }

    public function index()
    {
        $employee = Employee::all();
        $position = Position::all();

        return view('home.master.employee.index',[ 'title' => 'Employee', 'employee' => $employee, 'position' => $position]);
    }

    public function store(Request $request)
    {
        $employeeHelper = $this->employeeHelper->generateNumber(5);

        $dataEmployee = Employee::create([
            'EmployeeAddress' => $request->EmployeeAddress,
            'EmployeeName' => $request->EmployeeName,
            'EmployeeNumber' => $employeeHelper,
            'EmployeeEmail' => $request->EmployeeEmail,
            'EmployeePhone' => $request->EmployeePhone,
            'EmployeePositionId' => $request->EmployeePositionId,
            'EmployeeGender' => $request->EmployeeGender
        ]);

        $roleDefault = Role::where('MasterRoleName', 'US')->first();

        User::create([
            'UserEmployeeId' => $dataEmployee['EmployeeId'],
            'UserRoleId' => $roleDefault->MasterRoleId,
            'name' => $this->employeeHelper->generateusername($dataEmployee['EmployeeName']),
            'password' => bcrypt($this->employeeHelper->createPassword())
        ]);

        return redirect('/employee');
    }

    public function edit(int $id)
    {
        $employee = Employee::find($id);
        $position = Position::all();

        return view('home.master.employee.edit',[ 'title' => 'Employee', 'employee' => $employee, 'position' => $position]);
    }

    public function delete($id)
    {
        $user = User::where('UserEmployeeId', $id)->first();
        $user->delete();

        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee');
    }
}
