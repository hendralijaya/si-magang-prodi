@extends('partials.main')
@section('container')
<div class="container" style="margin-bottom: 20px; margin-top: 20px">
    <h3 style="margin-bottom: 20px;">Form Mentor</h3>
    <form action="{{ route('mentor.store') }}" method="POST">
      @csrf
    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nama Mentor
        </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_mentor">
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
        <input type="text" class="form-control" name="email_mentor">
        @error('email_mentor')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nomor Handphone
        </label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="no_hp">
        @error('nomor_telepon')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

  <div class= "mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
      Asal Perusahaan
    </label>
    <div class="col-sm-10">
        @error('id_perusahaan')
        <div class="alert alert-danger col-sm-10">
            <small>{{ $message }}</small>
        </div>
        @enderror

        <select name="id_perusahaan" id="" class="form-select">
            @foreach ($perusahaan as $p)
            <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
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
