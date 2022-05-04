@extends('partials.main')
@section('container')
<div class="container" style="margin-top:30px; margin-bottom:30px; background-color: rgb(250, 250, 250); border-radius: 30px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="container">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label" style="margin-top: 20px;"><b>NIM</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10" style="margin-top: 20px;">{{ $mahasiswa[0]->nim }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Email</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->email }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Nama</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->nama_mahasiswa }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Nomor HP</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->no_hp }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Jurusan</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->jurusan }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>KHS</b></label>
            <div class="col-sm-10">
                <a class="col-form-label col-sm-10" style="text-decoration: none" href="{{  asset($mahasiswa[0]->khs != NULL ? asset($mahasiswa[0]->khs) : '#') }}">Open the KHS</a>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Peminatan</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->peminatan }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Tahun Angkatan</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->tahun_angkatan }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Asuransi Kesehatan</b></label>
            <div class="col-sm-10">
                <a class="col-form-label col-sm-10" style="text-decoration: none" href="{{  asset($mahasiswa[0]->asuransi_kesehatan != NULL ? asset($mahasiswa[0]->asuransi_kesehatan) : '#') }}">Open The Asuransi Kesehatan</a>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label" style="margin-bottom: 20px"><b>Alamat</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10" style="margin-bottom: 20px">{{ $mahasiswa[0]->provinsi . ', ' . $mahasiswa[0]->kabupaten_kota . ' ' . $mahasiswa[0]->kode_pos . ' ' . $mahasiswa[0]->jalan }}</label>
            </div>
        </div>
    </div>
</div>

@endsection


