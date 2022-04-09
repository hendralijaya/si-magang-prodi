<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['id_role'] = "1";
        User::create($credentials);
        return redirect('/login')->with('success','Registration was successful! Please login');
    }
}
