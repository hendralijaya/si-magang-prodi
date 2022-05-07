@extends('partials.main')
@section('container')
<div class="container" style="margin-top: 20px; margin-bottom: 20px">
    <h3 style="margin-top: 20px; margin-bottom: 20px">Form Dosen Pembimbing</h3>
    <form action="{{ route('dosen.update',$dosen->nik) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Dosen
            </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_dosen" value="{{ $dosen->nama_dosen }}">
            @error('nama_dosen')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Prodi
            </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="prodi" value="{{ $dosen->prodi }}">
            @error('prodi')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                No HP
            </label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="no_hp" value="{{ $dosen->no_hp }}">
            @error('no_hp')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            </div>
        </div>

        <div class="submit-button  d-flex justify-content-end">
            <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
        </div>
    </form>
</div>
@endsection
