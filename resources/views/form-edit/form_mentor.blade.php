@extends('partials.main')
@section('container')
<div class="container" style="margin-top: 20px; margin-bottom: 20px">
    <h3 style="margin-top: 20px; margin-bottom: 20px">Form Mentor</h3>
    <form action="{{ route('mentor.update',$mentor->id_mentor) }}" method="POST">
        @method('PUT')
      @csrf
    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nama Mentor
        </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_mentor" value="{{ $mentor->nama_mentor }}">
        @error('nama_mentor')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Email Mentor
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email_mentor" value="{{ $mentor->email_mentor }}">
            @error('email_mentor')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label" >
            Nomor Handphone
        </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="no_hp" value="{{ $mentor->no_hp }}">
            @error('nomor_telepon')
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
