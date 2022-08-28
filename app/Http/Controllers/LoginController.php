<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('layouts.admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->id_role == 1){
                return redirect('/dashboard');
            } elseif(Auth::user()->id_role == 2){
                return redirect()->route('daftar.create');
            }
        }
        return back()->with('Error', 'Gagal Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registerindex()
    {
        return view('layouts.admin.register');
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required |max :100',
            'email' => 'required |max :100',
            'password' => 'required |max :100',
        ]);
        $user = new User();
        $user->id_role = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
