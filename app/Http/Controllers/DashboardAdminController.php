<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::select('SELECT COUNT(nim) AS jumlah_mahasiswa FROM mahasiswa');
        $dosen = DB::select('SELECT COUNT(nik) AS jumlah_dosen FROM dosen');
        $perusahaan = DB::select('SELECT COUNT(id_perusahaan) AS jumlah_perusahaan FROM perusahaan');
        $mentor = DB::select('SELECT COUNT(id_mentor) AS jumlah_mentor FROM mentor');
        $magang = DB::select('SELECT COUNT(id_magang) AS jumlah_magang FROM magang');
        $apply_magang = DB::select('SELECT COUNT(id_apply_magang) AS jumlah_apply_magang FROM apply_magang');
        return view('dashboard.admin.index', [
            'title' => 'Admin Dashboard',
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'perusahaan' => $perusahaan,
            'mentor' => $mentor,
            'magang' => $magang,
            'apply_magang' => $apply_magang,
        ]);
    }
}
