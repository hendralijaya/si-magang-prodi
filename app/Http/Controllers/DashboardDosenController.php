<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDosenController extends Controller
{
    public function index()
    {
        return view('dashboard.dosen.index', [
            'dosen' => auth()->user()->dosen,
            'title' => 'Dosen Dashboard',
        ]);
    }
}
