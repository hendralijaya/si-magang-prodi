@extends('partials.main') 
@section('container')
<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->nim }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->email }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->nama_mahasiswa }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Nomor HP</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->no_hp }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Jurusan</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->jurusan }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">KHS</label>
    <div class="col-sm-10">
        <a class="col-form-label col-sm-10" href="{{  asset($mahasiswa[0]->khs != NULL ? asset($mahasiswa[0]->khs) : '#') }}">Open the KHS</a>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Peminatan</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->peminatan }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Tahun Angkatan</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->tahun_angkatan }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Asuransi Kesehatan</label>
    <div class="col-sm-10">
        <a class="col-form-label col-sm-10" href="{{  asset($mahasiswa[0]->asuransi_kesehatan != NULL ? asset($mahasiswa[0]->asuransi_kesehatan) : '#') }}">Open The Asuransi Kesehatan</a>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $mahasiswa[0]->provinsi . ', ' . $mahasiswa[0]->kabupaten_kota . ' ' . $mahasiswa[0]->kode_pos . ' ' . $mahasiswa[0]->jalan }}</label>
    </div>
</div>


@endsection


