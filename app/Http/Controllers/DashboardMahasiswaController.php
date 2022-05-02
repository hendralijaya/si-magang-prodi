<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use App\Models\Magang;
use App\Models\Mentor;
use App\Models\Provinsi;
use App\Models\Mahasiswa;
use App\Models\Perusahaan;
use App\Models\ApplyMagang;
use Illuminate\Http\Request;
use App\Models\AlamatMahasiswa;
use Illuminate\Support\Facades\DB;

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
        $nim = auth()->user()->mahasiswa->nim;
        $mahasiswa = DB::select("SELECT * FROM mahasiswa, alamat_mahasiswa, users WHERE mahasiswa.nim = alamat_mahasiswa.nim AND mahasiswa.id_user = users.id AND mahasiswa.nim = ?", [$nim]);
        if($mahasiswa){
            return view('dashboard.mahasiswa.form_profile_mahasiswa', [
                'title' => 'Profile',
                'mahasiswa' => $mahasiswa,
                'provinsi' => Provinsi::all()
            ]);
        }
        else{
            $mahasiswa = DB::select("SELECT * FROM mahasiswa, alamat_mahasiswa, users WHERE mahasiswa.id_user = users.id AND mahasiswa.nim = ?", [$nim]);
            return view('dashboard.mahasiswa.form_profile_mahasiswa', [
                'title' => 'Profile',
                'mahasiswa' => $mahasiswa,
                'provinsi' => Provinsi::all()
            ]);
        }
    }

    public function updateProfile(Request $request){
        $validatedData = $request->validate([
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'jalan' => 'required',
            'khs' => 'required|mimes:pdf|max:2048',
            'asuransi_kesehatan' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $alamatMahasiswa = [
            'nim' => auth()->user()->mahasiswa->nim,
            'provinsi' => $validatedData['provinsi'],
            'kabupaten_kota' => $validatedData['kabupaten_kota'],
            'kode_pos' => $validatedData['kode_pos'],
            'jalan' => $validatedData['jalan'],
        ];

        $mahasiswa = [
            'khs' => $request->file('khs')->store('khs'),
            'asuransi_kesehatan' => $request->file('asuransi_kesehatan')->store('asuransi_kesehatan'),
        ];
        $mahasiswa = auth()->user()->mahasiswa;
        $mahasiswa->update($mahasiswa);
        AlamatMahasiswa::where('nim', $mahasiswa->nim)->update($alamatMahasiswa);
        return redirect()->route('mahasiswa.dashboard')->with('success', 'Alamat mahasiswa has been updated successfully');
    }

    public function listMagang()
    {
        $nim = auth()->user()->mahasiswa->nim;
        $magang = DB::select("SELECT * FROM magang, mahasiswa, mentor, dosen, perusahaan WHERE magang.nim = mahasiswa.nim AND magang.id_mentor = mentor.id_mentor AND mentor.id_perusahaan = perusahaan.id_perusahaan AND magang.nik = dosen.nik AND mahasiswa.nim = ? ORDER BY nama_perusahaan ASC", [$nim]);
        return view('dashboard.mahasiswa.magang', [
            'title' => 'List Form Magang',
            'magang' => $magang,
        ]);
    }

    public function listApplyMagang()
    {
        $nim = auth()->user()->mahasiswa->nim;
        $applymagang = DB::select("SELECT * FROM mahasiswa_apply_magang_perusahaan, mahasiswa, perusahaan WHERE mahasiswa_apply_magang_perusahaan.id_perusahaan = perusahaan.id_perusahaan AND mahasiswa_apply_magang_perusahaan.nim = mahasiswa.nim AND mahasiswa.nim = ? ORDER BY nama_perusahaan ASC", [$nim]);
        return view('dashboard.mahasiswa.applymagang', [
            'title' => 'List Apply Magang',
            'applymagang' => $applymagang,
        ]);
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
                'tanggal_apply' => $validatedData['tanggal_apply'],
                'status_apply' => $validatedData['status_apply'],
                'tanggal_respon' => $validatedData['tanggal_respon']
            ];
                $validatedDataApplyMagang['foto_mahasiswa'] = $request->file('foto_mahasiswa')->store('dokumen_apply_magang/foto_mahasiswa');
                $validatedDataApplyMagang['formulir_pendaftaran_kerja_praktik'] = $request->file('formulir_pendaftaran_kerja_praktik')->store('dokumen_apply_magang/formulir_pendaftaran_kerja_praktik');
                $validatedDataApplyMagang['surat_pengantar_kerja_praktik'] = $request->file('surat_pengantar_kerja_praktik')->store('dokumen_apply_magang/surat_pengantar_kerja_praktik');
                $validatedDataApplyMagang['cv'] = $request->file('cv')->store('dokumen_apply_magang/cv');
                $validatedDataApplyMagang['cover_letter'] = $request->file('cover_letter')->store('dokumen_apply_magang/cover_letter');
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
        $mentor = Mentor::all();
        return view('form.form_magang',[
            'perusahaan' => $perusahaan,
            'title' => 'Form Magang',
            'dosen' => $dosen,
            'mentor' => $mentor
        ]);
    }

    public function storeMagang(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mentor' => 'required',
            'no_hp' => 'required',
            'email_mentor' => 'required',
            'id_perusahaan' => 'required',
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
        $validatedDataMentor = $request->validate([
            'nama_mentor' => $validatedData['nama_mentor'],
            'no_hp' => $validatedData['no_hp'],
            'email_mentor' => $validatedData['email_mentor'],
            'id_perusahaan' => $validatedData['id_perusahaan'],
        ]);
        $validatedDataMagang = $request->validate([
            'tanggal_pengambilan' => $validatedData['tanggal_pengambilan'],
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'semester' => $validatedData['semester'],
            'id_perusahaan' => $validatedData['id_perusahaan'],
            'nik' => $validatedData['nik']
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