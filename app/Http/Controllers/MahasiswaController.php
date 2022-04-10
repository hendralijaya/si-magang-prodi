<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\AlamatMahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = DB::select("SELECT * FROM mahasiswa ORDER BY nama_mahasiswa ASC");
        return view('dashboard.admin.mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Mahasiswa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.form_mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDataMahasiswa = $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama_mahasiswa' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'khs' => 'required|mimes:pdf|max:2048',
            'peminatan' => 'required',
            'tahun_angkatan' => 'required',
            'asuransi_kesehatan' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $validatedDataAlamatMahasiswa = $request->validate([
            'nim' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'jalan' => 'required'
        ]);
        $validatedDataUser = $request->validate([
            'email' => 'required|email:dns|unique:user',
            'password' => 'required|min:8',
        ]);
        
        if($request->file('khs')){
            $validatedDataMahasiswa['khs'] = $request->file('khs')->store('khs');
        }
        if($request->file('asuransi_kesehatan')){
            $validatedDataMahasiswa['asuransi_kesehatan'] = $request->file('asuransi_kesehatan')->store('asuransi_kesehatan');
        }
        $validatedDataUser['id_role'] = 2;
        $idUser = User::create($validatedDataUser)->id;
        $validatedDataMahasiswa['id_user'] = $idUser;
        Mahasiswa::create($validatedDataMahasiswa);
        AlamatMahasiswa::create($validatedDataAlamatMahasiswa);
        
        return redirect()->intended(route('mahasiswa.index'))->with('success','Data mahasiswa has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.admin.show_mahasiswa', [
            'mahasiswa' => Mahasiswa::findOrFail($id)->alamat_mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin.edit_mahasiswa', [
            'mahasiswa' => Mahasiswa::findOrFail($id),
            'alamat_mahasiswa' => AlamatMahasiswa::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedDataMahasiswa = $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama_mahasiswa' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'khs' => 'required|mimes:pdf|max:2048',
            'peminatan' => 'required',
            'tahun_angkatan' => 'required',
            'asuransi_kesehatan' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $validatedDataAlamatMahasiswa = $request->validate([
            'nim' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'jalan' => 'required'
        ]);

        if($request->file('khs')){
            if($request->file('oldkhs')){
                Storage::delete($request->file('oldkhs'));
            }
            $validatedDataMahasiswa['khs'] = $request->file('khs')->store('khs');
        }
        
        if($request->file('asuransi_kesehatan')){
            if($request->file('oldasuransi_kesehatan')){
                Storage::delete($request->file('oldasuransi_kesehatan'));
            }
            $validatedDataMahasiswa['asuransi_kesehatan'] = $request->file('asuransi_kesehatan')->store('asuransi_kesehatan');
        }
        Mahasiswa::where('nim', $id)->update($validatedDataMahasiswa);
        AlamatMahasiswa::where('nim', $id)->update($validatedDataAlamatMahasiswa);

        return redirect()->intended(route('mahasiswa.index'))->with('success','Data mahasiswa has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if($mahasiswa->khs){
            Storage::delete($mahasiswa->khs);
        }
        if($mahasiswa->asuransi_kesehatan){
            Storage::delete($mahasiswa->asuransi_kesehatan);
        }
        Mahasiswa::destroy($id);
        return redirect()->intended(route('mahasiswa.index'))->with('success','Data mahasiswa has been successfully deleted');
    }
}
