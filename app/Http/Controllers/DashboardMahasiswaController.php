<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Perusahaan;
use App\Models\ApplyMagang;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {

        return view('dashboard.mahasiswa.index', [
            'mahasiswa' => auth()->user()->mahasiswa
        ]);
    }

    public function profile()
    {
        return view('dashboard.mahasiswa.profile');
    }

    public function listFormMagang()
    {
        return view();
    }

    public function  formApplyMagang()
    {
        $perusahaan = Perusahaan::all();
        return view('dashboard.mahasiswa.form_apply_magang',[
            'perusahaan' => $perusahaan
        ]);
    }

    public function storeApplyMagang(Request $request)
    {
        if($request['id_perusahaan'] != ''){
            $validatedData = $request->validate([
                'id_perusahaan' => 'required',
                'foto_mahasiswa' => 'required',
                'formulir_pendaftaran_kerja_praktik' => 'required',
                'surat_pengantar_kerja_praktik' => 'required',
                'cv' => 'required',
                'cover_letter' => 'required',
                'tanggal_apply' => 'required',
                'status_apply' => 'required',
                'tanggal_respon' => 'required'
            ]);
            $validatedData['nim'] = auth()->user()->mahasiswa->nim;
            ApplyMagang::create($validatedData);
            return redirect()->route('mahasiswa.index');
        }else{
            $validatedDataPerusahaan = $request->validate([
                'nama_perusahaan' => 'required',
                'status_kerja_sama' => 'required',
                'nomor_telepon' => 'required',
                'email_perusahaan' => 'required'
            ]);
            $validatedDataApplyMagang = $request->validate([
                'foto_mahasiswa' => 'required',
                'formulir_pendaftaran_kerja_praktik' => 'required',
                'surat_pengantar_kerja_praktik' => 'required',
                'cv' => 'required',
                'cover_letter' => 'required',
                'tanggal_apply' => 'required',
                'status_apply' => 'required',
                'tanggal_respon' => 'required',
            ]);
            $perusahaan = Perusahaan::create($validatedDataPerusahaan)->id;
            $validatedDataApplyMagang['id_perusahaan'] = $perusahaan;
            $validatedData['nim'] = auth()->user()->mahasiswa->nim;
            ApplyMagang::create($validatedDataApplyMagang);
            return redirect()->intended(route('mahasiswa.index'))->with('success','Apply Magang has been successfully applied');
        }
    }

    public function formMagang()
    {
        $perusahaan = Perusahaan::all();
        return view('dashboard.mahasiswa.form_magang',[
            'perusahaan' => $perusahaan
        ]);
    }

    public function storeMagang(Request $request)
    {
        $validatedDataMentor = $request->validate([
            'nama_mentor' => 'required',
            'no_hp' => 'required',
            'email_mentor' => 'required',
            'id_perusahaan' => 'required',
        ]);
        $validatedDataMagang = $request->validate([
            'tanggal_pengambilan' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required',
            'laporan_kerja_praktik' => 'required',
            'formulir_bimbingan_kerja_praktik' => 'required',
            'buku_aktivitas_harian_kerja_praktik' => 'required',
            'surat_keterangan_bebas_akademik' => 'required',
            'id_perusahaan' => 'required'
        ]);
        $idMentor = Mentor::create($validatedDataMentor)->id;
        $validatedDataMagang['id_mentor'] = $idMentor;
        $validatedDataMagang['nim'] = auth()->user()->mahasiswa->nim;
        return redirect()->intended(route('mahasiswa.index'))->with('success','Magang has been successfully applied');
    }


}