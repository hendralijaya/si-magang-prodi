@extends('partials.main')
@section('container')
    <h3>Form Mahasiswa</h3>
<form action="{{ route('mahasiswa.update',$mahasiswa[0]->nim) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Mahasiswa
        </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="nama_mahasiswa" value="{{ $mahasiswa[0]->nama_mahasiswa }}" disabled>
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
            <input type="number" class="col-sm-10" name="no_hp" value="{{ $mahasiswa[0]->no_hp }}">
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
            <input type="text" class="col-sm-10" name="jurusan" value="{{ $mahasiswa[0]->jurusan }}">
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
            <input type="text" class="col-sm-10" name="peminatan" value="{{ $mahasiswa[0]->peminatan }}">
            @error('peminatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <button type="submit" value="Submit">Submit</button>
</form>
@endsection