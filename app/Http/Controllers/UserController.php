<?php

namespace App\Http\Controllers;

use App\Enums\ResourceEnum;
use App\Helpers\StorageHelper;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        try {

            $user = User::all();
            $employee = Employee::whereDoesntHave('user')->get() ?? [];
            $role = Role::all();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('register.index', ['users' => $user, 'employee' => $employee,'role' => $role, 'title' => 'User']);
    }

    public function register()
    {
        try {
            $users = User::all();

            $getId = $users->pluck('UserEmployeeId');
            $data = Employee::whereNotIn('EmployeeId', $getId)->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('register.register', ['title' => 'User', 'user' => $data]);
    }

    public function show(Request $request)
    {
        try {

            $id = $request->input('id');
            $user = User::find($id);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('register.show', ['user' => $user, 'title' => 'User']);
    }

    public function edit(Request $request)
    {
        try {

            $id = $request->input('id');
            $user = User::find($id);
            $role = Role::all();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('register.edit', [
            'title' => 'User', 
            'user' => $user, 
            'role' => $role
        ]);
    }

    public function login()
    {
        return view('register.login', ['title' => 'login']);
    }

    public function authenticate(Request $request)
    {
        try {

            $credentials = $request->validate([
                'name' => ['required', 'max:255'],
                'password' => ['required', 'max:100', 'min:6'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
            }else{
                return back()->with('badRequest', 'Username atau password salah!, silahkan coba lagi!');
            }

        } catch (\Exception $e) {
            return back()->with('badRequest', $e->getMessage());
        }

        return redirect()->intended('/dashboard')->with('success', 'Login has been success!');
    }

    public function logout(Request $request)
    {
        try {

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/admin');
    }

    public function delete($id)
    {
        try {

            $user = User::find($id);
            $user->delete();

            session()->flash('success', 'User Berhasil dihapus');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return redirect('/index')->with('success', 'User berhasil dihapus');
    }

    public function editByUser()
    {
        try {

            $user = User::find(Auth::id());

            $employee = $user->employee->EmployeeImagePath;

            if ($employee != null) {
                $image = Storage::temporaryUrl($employee, now()->addMinutes(5));
            } else {
                $image = asset('assets/images/PNS.jpg');
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return view('home.settings.account', ['user' => $user, 'image' => $image, 'title' => 'Data Pribadi']);
    }

    public function update(Request $request)
    {
        try {

            $id = $request->input('id');
            
            $user = User::find($id);
            $role = Role::all();

            $request->validate([
                'name' => [
                    'exists:User,name'
                ],
            ]);

            if ($request->filled('password')) {
                $password = bcrypt($request->password);
            }

            if ($request->hasFile('EmployeeImage')) {
                $path = StorageHelper::storeFileImage($request->EmployeeImage, ResourceEnum::USER);

                $user->employee->update([
                    'EmployeeImagePath' => $path,
                ]);
            }

            $user->update([
                'password' => $password ?? $user->password,
                'name' => $request->name ?? $user->name,
                'UserRoleId' => $request->UserRoleId ?? $user->UserRoleId,
            ]);

        } catch (\Exception $e) {

            return redirect('/user')->with('error', $e->getMessage());
        }

        return view('register.edit', ['user' => $user, 'role' => $role,'title' => 'User'])->with('success', 'Data Berhasil Diupdate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'exists:User,name'],
            'password' => ['required', 'max:100', 'min:6'],
        ]);
        
        User::create($request->all());

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }
}
