<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magang = DB::select("SELECT * FROM magang, mahasiswa, mentor, dosen, perusahaan WHERE magang.nim = mahasiswa.nim AND magang.id_mentor = mentor.id_mentor AND mentor.id_perusahaan = perusahaan.id_perusahaan AND magang.nik = dosen.nik ORDER BY nama_perusahaan ASC");
        return view('dashboard.admin.magang', [
            'title' => 'Magang',
            'magang' => $magang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magang = DB::select("SELECT * FROM magang, mahasiswa WHERE magang.nim = mahasiswa.nim AND magang.id_magang = ?", [$id]);
        return view('form-edit.form_magang', [
            'title' => 'Edit Magang',
            'magang' => $magang,
            'dosen' => Dosen::all(),
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
            'nilai_magang_angka' => 'nullable',
            'nik' => 'nullable',
        ]);

        if($validatedData['nilai_magang_angka'] != null){
            if($validatedData['nilai_magang_angka'] >= 90){
                $validatedData['nilai_magang_huruf'] = 'A';
            }elseif($validatedData['nilai_magang_angka'] >= 80){
                $validatedData['nilai_magang_huruf'] = 'B';
            } else if($validatedData['nilai_magang_angka'] >= 70){
                $validatedData['nilai_magang_huruf'] = 'C';
            } else if($validatedData['nilai_magang_angka'] >= 60){
                $validatedData['nilai_magang_huruf'] = 'D';
            } else {
                $validatedData['nilai_magang_huruf'] = 'E';
            }
        }

        Magang::where('id_magang', $id)->update($validatedData);

        return redirect(route('magang.index'))->with('success', 'Magang has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Magang::where('id_magang', $id)->delete();
        return redirect()->intended(route('magang.index'))->with('success', 'Magang has been successfully deleted');
    }
}
