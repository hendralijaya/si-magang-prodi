<?php

namespace App\Http\Controllers;

use App\Models\AlamatPerusahaan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('dashboard.admin.perusahaan', [
            'title' => 'Perusahaan',
            'perusahaan' => $perusahaan
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.form_perusahaan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDataPerusahaan = $request->validate([
            'nama_perusahaan' => 'required',
            'status_kerja_sama' => 'required',
            'nomor_telepon' => 'required',
            'email_perusahaan' => 'required',
            'moa' => 'nullable|mimes:pdf|max:2048',
            'mou' => 'nullable|mimes:pdf|max:2048'
        ]);
        $validatedDataAlamatPerusahaan = $request->validate([
            'id_perusahaan' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'jalan' => 'required'
        ]);
        if($request->file('moa')){
            $validatedDataPerusahaan['moa'] = $request->file('moa')->store('moa');
        }
        if($request->file('mou')){
            $validatedDataPerusahaan['mou'] = $request->file('mou')->store('mou');
        }
        Perusahaan::create($validatedDataPerusahaan);
        AlamatPerusahaan::create($validatedDataAlamatPerusahaan);
        return redirect()->intended(route('perusahaan.index'))->with('success', 'Perusahaan has been successfully stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perusahaan = Perusahaan::where('id_perusahaan', $id)->first();
        return view('dashboard.admin.show_perusahaan', [
            'perusahaan' => $perusahaan
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
        return view('dashboard.admin.edit_perusahaan', [
            'perusahaan' => Perusahaan::findOrFail($id)->alamat_perusahaan
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
        $validatedDataPerusahaan = $request->validate([
            'nama_perusahaan' => 'required',
            'status_kerja_sama' => 'required',
            'nomor_telepon' => 'required',
            'email_perusahaan' => 'required',
            'moa' => 'nullable|mimes:pdf|max:2048',
            'mou' => 'nullable|mimes:pdf|max:2048'
        ]);

        $validatedDataAlamatPerusahaan = $request->validate([
            'nama_perusahaan' => 'required',
            'status_kerja_sama' => 'required',
            'nomor_telepon' => 'required',
            'email_perusahaan' => 'required',
            'moa' => 'nullable|mimes:pdf|max:2048',
            'mou' => 'nullable|mimes:pdf|max:2048'
        ]);

        if($request->file('moa')){
            if($request->file('oldmoa')){
                Storage::delete($request->file('oldmoa'));
            }
            $validatedDataPerusahaan['moa'] = $request->file('moa')->store('moa');
        }

        if($request->file('mou')){
            if($request->file('oldmou')){
                Storage::delete($request->file('oldmou'));
            }
            $validatedDataPerusahaan['moa'] = $request->file('mou')->store('mou');
        }
        Perusahaan::where('id_perusahaan', $id)->update($validatedDataPerusahaan);
        AlamatPerusahaan::where('id_perusahaan', $id)->update($validatedDataAlamatPerusahaan);
        return redirect()->intended(route('perusahaan.index'))->with('success', 'Perusahaan has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = Perusahaan::where('id_perusahaan',$id)->first();
        if($perusahaan->mou != NULL){
            Storage::delete($perusahaan->mou);
        }
        if($perusahaan->moa != NULL){
            Storage::delete($perusahaan->moa);
        }
        Perusahaan::where('id_perusahaan',$id)->delete();
        return redirect()->intended(route('perusahaan.index'))->with('success', 'Perusahaan has been successfully deleted');
    }
}
