<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardDosenController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard.dosen.index', [
    //         'dosen' => auth()->user()->dosen,
    //         'title' => 'Dosen Dashboard',
    //     ]);
    // }
    public function profile()
    {
        $nik = auth()->user()->dosen->nik;
        $dosen = DB::select('SELECT * FROM dosen, users WHERE dosen.id_user = users.id AND nik = ?', [$nik]);
        return view('dashboard.dosen.profile', [
            'dosen' => $dosen,
            'title' => 'Dosen Profile',
        ]);
    }
}
