<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login',[
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
                $request->session()->put('id_role',auth()->user()->id_role );
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }else if(auth()->user()->id_role == '2'){
                $request->session()->regenerate();
                return redirect()->intended(route('mahasiswa.index'))->with('success','Login success!');
            }else if(auth()->user()->id_role == '3'){
                $request->session()->regenerate();
                return redirect()->intended(route('admin.index'))->with('success','Login success!');
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
