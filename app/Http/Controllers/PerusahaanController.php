<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AlamatPerusahaan;
use App\Models\BidangPerusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perusahaan = DB::select('SELECT * FROM perusahaan NATURAL LEFT JOIN (SELECT *, COUNT(DISTINCT apply_magang.nim) AS jumlah_mahasiswa_apply_magang, COUNT(DISTINCT magang.nim) AS jumlah_mahasiswa_magang FROM mahasiswa NATURAL LEFT JOIN apply_magang NATURAL LEFT JOIN magang GROUP BY mahasiswa.nim) AS sq');
        return view('dashboard.admin.perusahaan', [
            'title' => 'Perusahaan',
            'perusahaan' => $perusahaan,
            'provinsi' => Provinsi::all(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.form_perusahaan',[
            'title' => 'Tambah Perusahaan',
            'provinsi' => Provinsi::all()
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
            'nama_perusahaan' => 'required',
            'nomor_telepon' => 'required',
            'email_perusahaan' => 'required',
            'moa' => 'nullable|mimes:pdf|max:2048',
            'mou' => 'nullable|mimes:pdf|max:2048',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'jalan' => 'required',
            'bidang_perusahaan' => 'required'
        ]);
        $validatedDataPerusahaan = [
            'nama_perusahaan' => $validatedData['nama_perusahaan'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'email_perusahaan' => $validatedData['email_perusahaan'],
            'moa' => $validatedData['moa'],
            'mou' => $validatedData['mou'],
        ];
        $validatedDataAlamatPerusahaan = [
            'provinsi' => $validatedData['provinsi'],
            'kabupaten_kota' => $validatedData['kabupaten_kota'],
            'kode_pos' => $validatedData['kode_pos'],
            'jalan' => $validatedData['jalan'],
        ];
        $validatedDataBidangPerusahaan = [
            'bidang_perusahaan' => $validatedData['bidang_perusahaan'],
        ];
        if($request->file('moa')){
            $validatedDataPerusahaan['moa'] = $request->file('moa')->store('dokumen_perusahaan/moa');
        }
        if($request->file('mou')){
            $validatedDataPerusahaan['mou'] = $request->file('mou')->store('dokumen_perusahaan/mou');
        }
        $idPerusahaan = Perusahaan::create($validatedDataPerusahaan)->id;
        $validatedDataAlamatPerusahaan['id_perusahaan'] = $idPerusahaan;
        AlamatPerusahaan::create($validatedDataAlamatPerusahaan);
        for($i = 0; $i < count($validatedDataBidangPerusahaan['bidang_perusahaan']); $i++){
            $batchBidangPerusahaan[$i] = [
                'id_perusahaan' => $idPerusahaan,
                'bidang_perusahaan' => $validatedDataBidangPerusahaan['bidang_perusahaan'][$i]
            ];
        }
        BidangPerusahaan::insert($batchBidangPerusahaan);
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
        $perusahaan = DB::select('SELECT nama_perusahaan, status_kerja_sama, nomor_telepon, email_perusahaan, moa, mou, COUNT(DISTINCT id_mentor) AS jumlah_mentor, alamat_perusahaan.*, bidang_perusahaan.*   
        FROM perusahaan, mentor, alamat_perusahaan, bidang_perusahaan WHERE perusahaan.id_perusahaan = mentor.id_perusahaan 
        AND perusahaan.id_perusahaan = alamat_perusahaan.id_perusahaan AND perusahaan.id_perusahaan = bidang_perusahaan.id_perusahaan 
        AND  bidang_perusahaan.id_perusahaan = ? GROUP BY bidang_perusahaan.bidang_perusahaan', [$id]);
        return view('details.perusahaan', [
            'perusahaan' => $perusahaan,
            'title' => 'Perusahaan Detail'
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
        $perusahaan = Perusahaan::where('id_perusahaan', $id)->first();
        return view('form-edit.form_perusahaan', [
            'perusahaan' => $perusahaan,
            'title' => 'Edit Perusahaan',
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
            'status_kerja_sama' => 'required',
            'nomor_telepon' => 'required',
            'email_perusahaan' => 'required',
            'moa' => 'nullable|mimes:pdf|max:2048',
            'mou' => 'nullable|mimes:pdf|max:2048'
        ]);

        if($request->file('moa')){
            if($request->oldmoa){
                Storage::delete($request->oldmoa);
            }
            $validatedDataPerusahaan['moa'] = $request->file('moa')->store('dokumen_perusahaan/moa');
        }

        if($request->file('mou')){
            if($request->oldmou){
                Storage::delete($request->oldmou);
            }
            $validatedDataPerusahaan['moa'] = $request->file('mou')->store('dokumen_perusahaan/mou');
        }
        Perusahaan::where('id_perusahaan', $id)->update($validatedDataPerusahaan);
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
