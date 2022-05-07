@extends('partials.main')
@section('container')
<div class="container" style="margin-top: 20px; margin-bottom: 20px">
    <h3 style="margin-top: 20px; margin-bottom: 20px">Form Mahasiswa</h3>
<form action="{{ route('mahasiswa.update',$mahasiswa[0]->nim) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Mahasiswa
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_mahasiswa" value="{{ $mahasiswa[0]->nama_mahasiswa }}" disabled>
            @error('nama_mahasiswa')
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
        <div class= "col-sm-10">
            <input type="number" class="form-control" name="no_hp" value="{{ $mahasiswa[0]->no_hp }}">
            @error('no_hp')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Jurusan
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa[0]->jurusan }}">
            @error('jurusan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Peminatan
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="peminatan" value="{{ $mahasiswa[0]->peminatan }}">
            @error('peminatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="submit-button  d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
    </div>
</form>
</div>
@endsection
