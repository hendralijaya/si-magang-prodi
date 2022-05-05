<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
  </head>
  <body>

@extends('partials.main')
@section('container')
    <div class="container" style="margin-top: 20px; margin-bottom: 20px">
        <h3 style="margin-bottom: 20px">Form Mahasiswa</h3>
<form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class = "mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            NIM
        </label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="nim">
        @error('nim')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Mahasiswa
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_mahasiswa">
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
        <div class="col-sm-10">
            <input type="number" class="form-control" name="no_hp">
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
        <div class="col-sm-10">
        @error('jurusan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        <select name="jurusan" id="" class="form-select">
            <option value="Informatika">Informatika</option>
            <option value="Sstem Informasi">Sistem Informasi</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
            <option value="Arsitektur">Arsitektur</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="Seni Kuliner">Seni Kuliner</option>
            <option value="Manajemen Bisnis">Manajemen Bisnis</option>
            <option value="Perencanaan Wilayah Kota">Perencanaan Wilayah Kota</option>
            <option value="Hospitality dan Pariwisata">Hospitality dan Pariwisata</option>
            <option value="Manajemen Retail">Manajemen Retail</option>
            <option value="Desain Interior">Desain Interior</option>
            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
        </select>
        </div>
    </div>


    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Peminatan
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="peminatan">
            @error('peminatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Tahun Angkatan
        </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="tahun_angkatan">
            @error('tahun_angkatan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Email
        </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email">
            @error('email')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Password
        </label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
            @error('password')
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
