<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = DB::select("SELECT dosen.*, (SELECT COUNT(DISTINCT magang.nim) FROM magang WHERE dosen.nik = magang.nik AND tahun_ajaran = '2022') AS jumlah_mahasiswa_dibimbing_tahun_ini FROM `dosen` GROUP BY dosen.nik");
        return view('dashboard.admin.dosen', [
            'dosen' => $dosen,
            'title' => 'Dosen'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.form_dosen', [
            'title' => 'Tambah Dosen'
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
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama_dosen' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);
        $validatedDataDosen = [
            'nik' => $validatedData['nik'],
            'nama_dosen' => $validatedData['nama_dosen'],
            'prodi' => $validatedData['prodi'],
            'no_hp' => $validatedData['no_hp'],
        ];

        $validatedDataUser = [
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'id_role' => 3
        ];
        $idUser = User::create($validatedDataUser)->id;
        $validatedDataDosen['id_user'] = $idUser;
        Dosen::create($validatedDataDosen);
        return redirect()->intended(route('dosen.index'))->with('success','Dosen has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosen = DB::select("SELECT * FROM dosen, users WHERE dosen.id_user = users.id AND nik = ?",[$id]);
        return view('details.dosen',[
            'dosen' => $dosen,
            'title' => 'Dosen Detail',
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
        return view('form-edit.form_dosen', [
            'dosen' => Dosen::where('nik', $id)->first(),
            'title' => 'Edit Dosen'
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
        $validatedDataDosen = $request->validate([
            'nama_dosen' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required'
        ]);
        Dosen::where('nik', $id)->update($validatedDataDosen);
        return redirect()->intended(route('dosen.index'))->with('success','Dosen has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::where('nik', $id)->delete();
        return redirect()->intended(route('dosen.index'))->with('success','Dosen has been successfully deleted');
    }
}
