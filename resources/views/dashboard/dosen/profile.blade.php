@extends('partials.main')
@section('container')
<div class="container" style="margin-top:30px; margin-bottom:30px; background-color: rgb(250, 250, 250); border-radius: 30px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="container">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label" style="margin-top: 20px;"><b>NIK</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10" style="margin-top: 20px;">{{ $dosen[0]->nik }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Nama</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $dosen[0]->nama_dosen }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Prodi</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $dosen[0]->prodi }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"><b>Nomor HP</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10">{{ $dosen[0]->no_hp }}</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label" style="margin-bottom: 20px"><b>Email</b></label>
            <div class="col-sm-10">
            <label class="col-form-label col-sm-10" style="margin-bottom: 20px">{{ $dosen[0]->email }}</label>
            </div>
        </div>
    </div>
</div>
@endsection
