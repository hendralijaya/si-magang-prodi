@extends('partials.main')
@section('container')
<div class="container">
    <h3>Form Magang</h3>
    <form action="{{ route('magang.update',$magang[0]->id_magang) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Mahasiswa
            </label>
            <input type="text" name="nama_mahasiswa" class="col-sm-10" value='{{ $magang[0]->nama_mahasiswa }}' disabled>
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
            <input type="text" name="jurusan" class="col-sm-10" value='{{ $magang[0]->jurusan }}' disabled>
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
            <input type="text" name="jurusan" class="col-sm-10" value='{{ $magang[0]->peminatan }}' disabled>
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
            <input type="text" name="nilai_magang_angka" class="col-sm-10" value='{{ $magang[0]->nilai_magang_angka != null ? $magang[0]->nilai_magang_angka : '' }}'>
            @error('nilai_magang_angka')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Mentor</label>
            @error('nik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <select name="nik" id="" class="col-sm-10">
            @foreach ($dosen as $d)
              <option value="{{ $d->nik }}">{{ $d->nama_dosen }}</option>
            @endforeach
            </select>
        </div>

        <button type="submit" value="Submit">Submit</button>
    </form>
</div>
@endsection
