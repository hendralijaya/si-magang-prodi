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
        return view('form.form_mahasiswa', [
            'title' => 'Tambah Mahasiswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'nim' => 'required|unique:mahasiswa',
            'nama_mahasiswa' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'khs' => 'required|mimes:pdf|max:2048',
            'peminatan' => 'required',
            'tahun_angkatan' => 'required',
            'asuransi_kesehatan' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);
        $validatedDataMahasiswa = [
            'nim' => $validatedData['nim'],
            'nama_mahasiswa' => $validatedData['nama_mahasiswa'],
            'no_hp' => $validatedData['no_hp'],
            'jurusan' => $validatedData['jurusan'],
            'khs' => $validatedData['khs'],
            'peminatan' => $validatedData['peminatan'],
            'tahun_angkatan' => $validatedData['tahun_angkatan'],
            'asuransi_kesehatan' => $validatedData['asuransi_kesehatan']
        ];
        $validatedDataUser = [
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'id_role' => 2
        ];
        
        if($request->file('khs')){
            $validatedDataMahasiswa['khs'] = $request->file('khs')->store('khs');
        }
        if($request->file('asuransi_kesehatan')){
            $validatedDataMahasiswa['asuransi_kesehatan'] = $request->file('asuransi_kesehatan')->store('asuransi_kesehatan');
        }
        $idUser = User::create($validatedDataUser)->id;
        $validatedDataMahasiswa['id_user'] = $idUser;
        Mahasiswa::create($validatedDataMahasiswa);
        
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
        $mahasiswa = DB::select("SELECT * FROM mahasiswa, users, alamat_mahasiswa WHERE mahasiswa.id_user = users.id AND mahasiswa.nim = alamat_mahasiswa.nim AND mahasiswa.nim = $id");
        return view('details.show_mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Detail Mahasiswa'
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
        $mahasiswa = DB::select("SELECT * FROM mahasiswa, users WHERE mahasiswa.id_user = users.id AND mahasiswa.nim = $id");
        return view('form-edit.form_mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Edit Mahasiswa'
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
        $validatedData = $request->validate([
            'no_hp' => 'required',
            'jurusan' => 'required',
            'peminatan' => 'required',
        ]);
        Mahasiswa::where('nim', $id)->update($validatedData);
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
