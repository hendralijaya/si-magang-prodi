@extends('partials.main')
@section('container')
    <h3>Form Magang</h3>
    <form action="{{ route('mahasiswa.storeMagang') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Mahasiswa
            </label>
            <input type="text" name="nama_mahasiswa" value='{{ $magang[0]->nama_mahasiswa }}'>
            @error('nama_mahasiswa')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Jurusan
            </label>
            <input type="text" name="jurusan" value='{{ $magang[0]->jurusan }}'>
            @error('jurusan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Peminatan
            </label>
            <input type="text" name="jurusan" value='{{ $magang[0]->peminatan }}'>
            @error('peminatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nilai Magang Angka
            </label>
            <input type="text" name="nilai_magang_angka" value='{{ $magang[0]->nilai_magang_angka != null ? $magang[0]->nilai_magang_angka : '' }}'>
            @error('nilai_magang_angka')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nilai Magang Huruf
            </label>
            <input type="text" name="nilai_magang_huruf" value='{{ $magang[0]->nilai_magang_huruf != null ? $magang[0]->nilai_magang_huruf : '' }}'>
        @error('nilai_magang_huruf')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        <button type="submit" value="Submit">Submit</button>
    </form>
@endsection