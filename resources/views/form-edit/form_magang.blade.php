@extends('partials.main')
@section('container')
<div class="container" style="margin-top: 20px; margin-bottom: 20px">
    <h3 style="margin-top: 20px; margin-bottom: 20px">Form Magang</h3>
    <form action="{{ route('magang.update',$magang[0]->id_magang) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Mahasiswa
            </label>
            <div class="col-sm-10">
                <input type="text" name="nama_mahasiswa" class="form-control" value='{{ $magang[0]->nama_mahasiswa }}' disabled>
                @error('nama_mahasiswa')
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
            <div class="col-sm-10">
                <input type="text" name="jurusan" class="form-control" value='{{ $magang[0]->jurusan }}' disabled>
                @error('jurusan')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Peminatan
            </label>
            <div class="col-sm-10">
                <input type="text" name="jurusan" class="form-control" value='{{ $magang[0]->peminatan }}' disabled>
                @error('peminatan')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nilai Magang Angka
            </label>
            <div class="col-sm-10">
                <input type="text" name="nilai_magang_angka" class="form-control" value='{{ $magang[0]->nilai_magang_angka != null ? $magang[0]->nilai_magang_angka : '' }}'>
                @error('nilai_magang_angka')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Mentor</label>
            <div class="col-sm-10">
                @error('nik')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
                <select name="nik" id="" class="form-select">
                @foreach ($dosen as $d)
                <option value="{{ $d->nik }}">{{ $d->nama_dosen }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="submit-button  d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        </div>
    </form>
</div>
@endsection
