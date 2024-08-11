<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Unit;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('register.index', ['users'=> $user, 'title' => 'Pengguna']);
    }

    public function register()
    {   
        $users = User::all();
        $unit = Unit::all();
        
        $getId = $users->pluck('UserEmployeeId');

        $data = Employee::whereNotIn('EmployeeId', $getId)->get();

        return view('register.register', ['title' => 'Pengguna', 'user' => $data]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('register.show',['user'=> $user, 'title' => 'Pengguna']);
    }

    public function edit($id)
    {
        $edit = User::find($id);
        $role = Role::all();

        return view('register.edit',['user'=> $edit, 'title' => 'Pengguna', 'role' => $role]);
    }

    public function login()
    {
        return view('register.login',['title'=> 'login']);
    }

    public function authenticate(Request $request)
    {

       $credentials = $request->validate([
        'name'=>['required', 'max:255'],
        'password'=> ['required', 'max:100','min:6']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        
        return back()->withErrors([
            'name' => 'Login Failed, name or password may wrong',
        ])->onlyInput('name');
    }

    public function logout(Request $request){
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

    public function editByUser($id)
    {
        $user = User::find($id);
        return view('home.settings.account', ['user'=>$user, 'title' => 'Pengguna']);
    }

    public function updateByUser(Request $request, $id)
    {
        $user = User::find($id);

        $email = $request->name;

        if ($request->filled('password')) 
        {
            $password = bcrypt($request->password);
        }else {
            $password = $user->password;
        }
        
        $user->update([
            'password' => $password,
            'name' => $email ?? $user->name,
            'UserRoleId' => $request->UserRoleId ?? $user->UserRoleId
        ]);

        $request->session()->flash('success', 'Berhasil mengupdate Data!');

        return redirect('/index')->with('success', 'Berhasil Mengupdate Data');
    }
}