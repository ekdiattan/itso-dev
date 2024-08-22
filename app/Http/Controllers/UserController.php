<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        try{

            $user = User::all();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return view('register.index', ['users' => $user, 'title' => 'Pengguna']);
    }

    public function register()
    {

        try{

            $users = User::all();
            $unit = Unit::all();
            $getId = $users->pluck('UserEmployeeId');
            $data = Employee::whereNotIn('EmployeeId', $getId)->get();

        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
        
        return view('register.register', ['title' => 'Pengguna', 'user' => $data]);
    }

    public function show(Request $request)
    {
        $id = $request->input('id');

        $user = User::find($id);

        return view('register.show', ['user' => $user, 'title' => 'Pengguna']);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        
        $edit = User::find($id);
        $role = Role::all();

        return view('register.edit', ['user' => $edit, 'title' => 'Pengguna', 'role' => $role]);
    }

    public function login()
    {
        return view('register.login', ['title' => 'login']);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'password' => ['required', 'max:100', 'min:6'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', 'Login has been success!');
        }

        return back()->with('error', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        session()->flash('success', 'Pengguna Berhasil dihapus');

        return redirect('/index')->with('success', 'Pengguna berhasil dihapus');
    }

    public function editByUser()
    {
        $user = User::find(Auth::id());

        return view('home.settings.account', ['user' => $user, 'title' => 'Pengguna']);
    }

    public function updateByUser(Request $request, $id)
    {
        $user = User::find($id);

        $email = $request->name;

        if ($request->filled('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'password' => $password,
            'name' => $email ?? $user->name,
            'UserRoleId' => $request->UserRoleId ?? $user->UserRoleId,
        ]);

        $request->session()->flash('success', 'Berhasil mengupdate Data!');

        return redirect('/index')->with('success', 'Berhasil Mengupdate Data');
    }
}
