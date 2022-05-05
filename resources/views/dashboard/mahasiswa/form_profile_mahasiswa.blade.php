@extends('partials.main')
@section('container')
<div class="container" style="margin-top:30px; margin-bottom:30px; background-color: rgb(250, 250, 250); border-radius: 30px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="container">
    <h3 style="margin-bottom: 20px;">Form Mahasiswa</h3>
<form action="{{ route('mahasiswa.editprofile') }}" method="POST" enctype="multipart/form-data">
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
            <input type="number" class="form-control" name="no_hp" value="{{ $mahasiswa[0]->no_hp }}" disabled>
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
            <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa[0]->jurusan }}" disabled>
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
            <input type="text" class="form-control" name="peminatan" value="{{ $mahasiswa[0]->peminatan }}" disabled>
            @error('peminatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    @if ($mahasiswa[0]->provinsi != null)
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Provinsi
        </label>
        <div class="col-sm-10">
            <select name="provinsi" id="" class="form-control">
              @foreach ($provinsi as $p)
                <option value="{{ $p->nama_provinsi }}" {{ $p->nama_provinsi == $mahasiswa[0]->provinsi ? 'selected' : '' }}>{{ $p->nama_provinsi }}</option>
              @endforeach
            </select>
            @error('provinsi')
                    <div class="alert alert-danger col-sm-10">
                        <small>{{ $message }}</small>
                    </div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Kabupaten/Kota
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="kabupaten_kota" value="{{ $mahasiswa[0]->kabupaten_kota }}">
            @error('kabupaten_kota')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Kode Pos
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="kode_pos" value="{{ $mahasiswa[0]->kode_pos }}">
            @error('kode_pos')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Jalan
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="jalan" value="{{ $mahasiswa[0]->jalan }}">
            @error('jalan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    @else
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Provinsi
        </label>
        <div class="col-sm-10">
            <select name="provinsi" id="" class="form-select">
              @foreach ($provinsi as $p)
                <option value="{{ $p->nama_provinsi }}">{{ $p->nama_provinsi }}</option>
              @endforeach
            </select>
            @error('provinsi')
                    <div class="alert alert-danger col-sm-10">
                        <small>{{ $message }}</small>
                    </div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Kabupaten/Kota
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="kabupaten_kota">
            @error('kabupaten_kota')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Kode Pos
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="kode_pos">
            @error('kode_pos')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Jalan
        </label>
        <div class= "col-sm-10">
            <input type="text" class="form-control" name="jalan">
            @error('jalan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>
    @endif

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Asuransi Kesehatan
        </label>
        <div class= "col-sm-10">
            <input type="file" class="form-control" name="asuransi_kesehatan">
            @error('asuransi_kesehatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            KHS
        </label>
        <div class= "col-sm-10">
            <input type="file" class="form-control" name="khs">
            @error('khs')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="submit-button  d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px" value="Submit">Submit</button>
    </div>
</form>
    </div>
    </div>
@endsection
