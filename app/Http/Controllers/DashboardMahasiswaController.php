<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use App\Models\Magang;
use App\Models\Mentor;
use App\Models\Perusahaan;
use App\Models\ApplyMagang;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {

        return view('dashboard.mahasiswa.index', [
            'title' => 'Dashboard Mahasiswa',
        ]);
    }

    public function profile()
    {
        return view('dashboard.mahasiswa.profile', [
            'mahasiswa' => auth()->user()->mahasiswa,
            'title' => 'Profile Mahasiswa',
        ]);
    }

    public function listFormMagang()
    {
        return view();
    }

    public function  formApplyMagang()
    {
        $perusahaan = Perusahaan::all();
        return view('form.form_apply_magang',[
            'perusahaan' => $perusahaan,
            'title' => 'Form Apply Magang',

        ]);
    }

    public function storeApplyMagang(Request $request)
    {
        if($request['id_perusahaan'] != NULL){
            $validatedData = $request->validate([
                'id_perusahaan' => 'required',
                'foto_mahasiswa' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'formulir_pendaftaran_kerja_praktik' => 'required|mimes:pdf|max:2048',
                'surat_pengantar_kerja_praktik' => 'required|mimes:pdf|max:2048',
                'cv' => 'required|mimes:pdf|max:2048',
                'cover_letter' => 'required|mimes:pdf|max:2048',
                'tanggal_apply' => 'required|before:today',
                'status_apply' => 'required',
                'tanggal_respon' => 'required|before:today'
            ]);
            $validatedData['foto_mahasiswa'] = $request->file('foto_mahasiswa')->store('dokumen_apply_magang/foto_mahasiswa');
            $validatedData['formulir_pendaftaran_kerja_praktik'] = $request->file('formulir_pendaftaran_kerja_praktik')->store('dokumen_apply_magang/formulir_pendaftaran_kerja_praktik');
            $validatedData['surat_pengantar_kerja_praktik'] = $request->file('surat_pengantar_kerja_praktik')->store('dokumen_apply_magang/surat_pengantar_kerja_praktik');
            $validatedData['cv'] = $request->file('cv')->store('dokumen_apply_magang/cv');
            $validatedData['cover_letter'] = $request->file('cover_letter')->store('dokumen_apply_magang/cover_letter');
            $validatedData['nim'] = auth()->user()->mahasiswa->nim;
            ApplyMagang::create($validatedData);
        }else{
            $validatedData = $request->validate([
                'foto_mahasiswa' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'formulir_pendaftaran_kerja_praktik' => 'required|mimes:pdf,doc,docx|max:2048',
                'surat_pengantar_kerja_praktik' => 'required|mimes:pdf,doc,docx|max:2048',
                'cv' => 'required|mimes:pdf,doc,docx|max:2048',
                'cover_letter' => 'required|mimes:pdf,doc,docx|max:2048',
                'tanggal_apply' => 'required|before:today',
                'status_apply' => 'required',
                'tanggal_respon' => 'required|before:today',
                'nama_perusahaan' => 'required',
                'status_kerja_sama' => 'required',
                'nomor_telepon' => 'required',
                'email_perusahaan' => 'required',
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kode_pos' => 'required',
                'jalan' => 'required'
            ]);
            $validatedDataPerusahaan = [
                'nama_perusahaan' => $validatedData['nama_perusahaan'],
                'status_kerja_sama' => $validatedData['status_kerja_sama'],
                'nomor_telepon' => $validatedData['nomor_telepon'],
                'email_perusahaan' => $validatedData['email_perusahaan']
            ];
            $validatedDataApplyMagang = [
                'nim' => auth()->user()->mahasiswa->nim,
                'foto_mahasiswa' => $validatedData['foto_mahasiswa'],
                'formulir_pendaftaran_kerja_praktik' => $validatedData['formulir_pendaftaran_kerja_praktik'],
                'surat_pengantar_kerja_praktik' => $validatedData['surat_pengantar_kerja_praktik'],
                'cv' => $validatedData['cv'],
                'cover_letter' => $validatedData['cover_letter'],
                'tanggal_apply' => $validatedData['tanggal_apply'],
                'status_apply' => $validatedData['status_apply'],
                'tanggal_respon' => $validatedData['tanggal_respon']
            ];
                $validatedDataApplyMagang['foto_mahasiswa'] = $request->file('foto_mahasiswa')->store(public_path('/storage/dokumen_apply_magang/foto_mahasiswa'));
                $validatedDataApplyMagang['formulir_pendaftaran_kerja_praktik'] = $request->file('formulir_pendaftaran_kerja_praktik')->store(public_path('/storage/dokumen_apply_magang/formulir_pendaftaran_kerja_praktik'));
                $validatedDataApplyMagang['surat_pengantar_kerja_praktik'] = $request->file('surat_pengantar_kerja_praktik')->store(public_path('/storage/dokumen_apply_magang/surat_pengantar_kerja_praktik'));
                $validatedDataApplyMagang['cv'] = $request->file('cv')->store(public_path('/storage/dokumen_apply_magang/cv'));
                $validatedDataApplyMagang['cover_letter'] = $request->file('cover_letter')->store(public_path('/storage/dokumen_apply_magang/cover_letter'));
            $perusahaan = Perusahaan::create($validatedDataPerusahaan)->id;
            $validatedDataApplyMagang['id_perusahaan'] = $perusahaan;
            ApplyMagang::create($validatedDataApplyMagang);
        }
        return redirect()->intended(route('mahasiswa.dashboard'))->with('success','Apply Magang has been successfully applied');
    }

    public function formMagang()
    {
        $perusahaan = Perusahaan::all();
        $dosen = Dosen::all();
        return view('form.form_magang',[
            'perusahaan' => $perusahaan,
            'title' => 'Form Magang',
            'dosen' => $dosen
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
            'id_perusahaan' => 'required',
            'nik' => 'required'
        ]);
        $validatedDataMagang['laporan_kerja_praktik'] = $request->file('laporan_kerja_praktik')->store('dokumen_magang/laporan_kerja_praktik');
        $validatedDataMagang['formulir_bimbingan_kerja_praktik'] = $request->file('formulir_bimbingan_kerja_praktik')->store('dokumen_magang/formulir_bimbingan_kerja_praktik');
        $validatedDataMagang['buku_aktivitas_harian_kerja_praktik'] = $request->file('buku_aktivitas_harian_kerja_praktik')->store('dokumen_magang/buku_aktivitas_harian_kerja_praktik');
        $validatedDataMagang['surat_keterangan_bebas_akademik'] = $request->file('surat_keterangan_bebas_akademik')->store('dokumen_magang/surat_keterangan_bebas_akademik');
        $idMentor = Mentor::create($validatedDataMentor)->id;
        $validatedDataMagang['id_mentor'] = $idMentor;
        $validatedDataMagang['nim'] = auth()->user()->mahasiswa->nim;
        $now = Carbon::now();
        $validatedDataMagang['id_magang'] = 'A';
        if($now->month > 8){
            $validatedDataMagang['id_magang'] = $validatedDataMagang['id_magang'] . '01' . $now->year;
        } else if($now->month > 1 && $now->month < 5){
            $validatedDataMagang['id_magang'] = $validatedDataMagang['id_magang'] . '02' . $now->year;
        } else {
            $validatedDataMagang['id_magang'] = $validatedDataMagang['id_magang'] . '03' . $now->year;
        }
        Magang::create($validatedDataMagang);
        return redirect()->intended(route('mahasiswa.dashboard'))->with('success','Magang has been successfully applied');
    }


}