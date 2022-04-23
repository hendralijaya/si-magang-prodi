@extends('partials.main')
@section('container')
    <h3>Form Dosen Pembimbing</h3>
    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                NIK
            </label>
            <div class="col-sm-10">
            <input type="number" class="col-sm-10" name="nik">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Dosen
            </label>
            <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="nama_dosen">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Prodi
            </label>
            <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="prodi">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                No HP
            </label>
            <div class="col-sm-10">
            <input type="number" class="col-sm-10" name="no_hp">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Email
            </label>
            <div class="col-sm-10">
            <input type="email" class="col-sm-10" name="email">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Password
            </label>
            <div class="col-sm-10">
            <input type="password" class="col-sm-10" name="password">
            </div>
        </div>
        
        <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
    </form>
@endsection