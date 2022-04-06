<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('dashboard.admin.dosen', [
            'dosen' => $dosen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.form_dosen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDataDosen = $request->validate([
            'nik' => 'required',
            'nama_dosen' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required'
        ]);

        $validatedDataUser = $request->validate([
            'email' => 'required|email:dns|unique:user',
            'password' => 'required|min:8',
        ]);
        $validatedDataUser['id_role'] = 3;
        $validatedDataUser['password'] = bcrypt($validatedDataUser['password']);
        
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
        return view('dashboard.admin.show_dosen',[
            'dosen' => Dosen::findOrFail($id)
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
        return view('dashboard.admin.edit_dosen', [
            'dosen' => Dosen::findOrFail($id)
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
            'nik' => 'required',
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
        Dosen::destroy($id);
        return redirect()->intended(route('dosen.index'))->with('success','Dosen has been successfully deleted');
    }
}