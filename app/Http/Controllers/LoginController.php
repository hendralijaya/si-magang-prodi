<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(auth()->user()->id_role == '1'){
                return redirect()->intended(route('admin.index'))->with('success','Login success!');
            }else if(auth()->user()->id_role == '2'){
                return redirect()->intended(route('mahasiswa.index'))->with('success','Login success!');
            }else if(auth()->user()->id_role == '3'){
                return redirect()->intended(route('dosen.index'))->with('success','Login success!');
            }
        }
        return back()->with('loginError','Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
