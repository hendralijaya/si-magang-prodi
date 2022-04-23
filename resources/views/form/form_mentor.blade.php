@extends('partials.main')
@section('container')
    <h3>Form Mentor</h3>
    <form action="{{ route('mentor.store') }}" method="POST">
      @csrf
    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nama Mentor
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="nama_mentor">
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
        <input type="text" class="col-sm-10" name="email_mentor">
        @error('email_mentor')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nomor Telepon
        </label>
        <div class="col-sm-10">
        <input type="number" class="col-sm-10" name="nomor_telepon">
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
    <select name="id_perusahaan" id="" class="col-sm-10">
      @foreach ($perusahaan as $p)
        <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
      @endforeach
    </select>
    </div>
</div>
</form>
    <button type="submit" value="Submit">Submit</button>
@endsection