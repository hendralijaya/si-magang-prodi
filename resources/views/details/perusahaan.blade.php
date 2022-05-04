@extends('partials.main')
@section('container')
<div class="container" style="margin-top:30px; margin-bottom:30px; background-color: rgb(250, 250, 250); border-radius: 30px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="container">

    <div class="mb-3 row" >
        <label for="" class="col-sm-2 col-form-label" style="margin-top: 20px;"><b>Nama Perusahaan</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10" style="margin-top: 20px;">{{ $perusahaan[0]->nama_perusahaan }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>Nomor Telepon</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->nomor_telepon }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>Status Kerjasama</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->status_kerja_sama != NULL ? $perusahaan[0]->status_kerja_sama : 'N/A' }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>Email</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->email_perusahaan }}</label>
        </div>
    </div>

    @if ($perusahaan[0]->moa != NULL)
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>MOA</b></label>
        <div class="col-sm-10">
        <a class="col-form-label" href="{{  route('download.moa',substr($perusahaan[0]->moa,23)) }}">Download MOA</a>
        </div>
    </div>
    @endif

    @if ($perusahaan[0]->mou != NULL)
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>MOU</b></label>
        <div class="col-sm-10">
            <a class="col-form-label" style="text-decoration: none;" href="{{  route('download.mou',substr($perusahaan[0]->mou,23)) }}">Download MOU</a>
        </div>
    </div>
    @endif

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>Alamat</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10"> {{ $perusahaan[0]->provinsi . ', ' . $perusahaan[0]->kabupaten_kota . ' ' . $perusahaan[0]->kode_pos . ' ' . $perusahaan[0]->jalan }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"><b>Bidang</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">
            @forelse ($perusahaan as $p)
                {{ $p->bidang_perusahaan }}
            @empty
                Perusahaan tidak memiliki bidang perusahaan
            @endforelse
        </label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label" style="margin-bottom: 20px"><b>Jumlah Mentor</b></label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10" style="margin-bottom: 20px">{{ $perusahaan[0]->jumlah_mentor }}</label>
        </div>
    </div>
    </div>
</div>
@endsection
