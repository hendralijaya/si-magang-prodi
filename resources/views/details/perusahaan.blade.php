@extends('partials.main') 
@section('container')
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Nama Perusahan</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->nama_perusahaan }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Nomor Telepon</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->nomor_telepon }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Status Kerjasama</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->status_kerja_sama != NULL ? $perusahaan[0]->status_kerja_sama : 'N/A' }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->email_perusahaan }}</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">MOA</label>
        <div class="col-sm-10">
        <a class="col-form-label col-sm-10" href="{{  asset($perusahaan[0]->moa != NULL ? asset($perusahaan[0]->moa) : '#') }}">Open the MOA</a>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">MOU</label>
        <div class="col-sm-10">
            <a class="col-form-label col-sm-10" href="{{  asset($perusahaan[0]->mou != NULL ? asset($perusahaan[0]->mou) : '#') }}">Open the MOU</a>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10"> {{ $perusahaan[0]->provinsi . ', ' . $perusahaan[0]->kabupaten_kota . ' ' . $perusahaan[0]->kode_pos . ' ' . $perusahaan[0]->jalan }}</label>
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Bidang</label>
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
        <label for="" class="col-sm-2 col-form-label">Jumlah Mentor</label>
        <div class="col-sm-10">
        <label class="col-form-label col-sm-10">{{ $perusahaan[0]->jumlah_mentor }}</label>
        </div>
    </div>
@endsection