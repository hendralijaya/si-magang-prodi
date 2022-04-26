@extends('partials.main') 
@section('container')
<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $dosen[0]->nik }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $dosen[0]->nama_dosen }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Prodi</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $dosen[0]->prodi }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Nomor HP</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $dosen[0]->no_hp }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <label class="col-form-label col-sm-10">{{ $dosen[0]->email }}</label>
    </div>
</div>
@endsection