<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = DB::select("SELECT * FROM mentor INNER JOIN perusahaan ON mentor.id_perusahaan = perusahaan.id_perusahaan ORDER BY nama_mentor ASC");
        return view('dashboard.admin.mentor',[
            'title' => 'Mentor',
            'mentor' => $mentor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.form_mentor', [
            'perusahaan' => Perusahaan::all(),
            'title' => 'Tambah Mentor'
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
        $validatedDataMentor = $request->validate([
            'nama_mentor' => 'required',
            'no_hp' => 'required',
            'email_mentor' => 'required|email:dns|unique:mentor',
            'id_perusahaan' => 'required'
        ]);

        Mentor::create($validatedDataMentor);
        return redirect()->intended(route('mentor.index'))->with('success','Mentor has been successfully added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.admin.show_mentor', [
            'mentor' => Mentor::where('id_mentor',$id)->first()
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
        $mentor = Mentor::where('id_mentor',$id)->first();
        return view('dashboard.admin.edit_mentor', [
            'mentor' => Mentor::where('id_mentor',$id)->first(),
            'perusahaan' => $mentor->perusahaan
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
        $validatedDataMentor = $request->validate([
            'nama_mentor' => 'required',
            'no_hp' => 'required',
            'email_mentor' => 'required|email:dns|unique:mentor',
            'id_perusahaan' => 'required'
        ]);

        Mentor::where('id_mentor',$id)->update($validatedDataMentor);
        return redirect()->intended(route('mentor.index'))->with('success','Mentor has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::where('id_mentor',$id)->delete();
        return redirect()->intended(route('mentor.index'))->with('success','Mentor has been successfully deleted');
    }
}
