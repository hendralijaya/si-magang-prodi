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
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Email Mentor
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="email_mentor">
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nomor Handphone
        </label>
        <div class="col-sm-10">
        <input type="number" class="col-sm-10" name="no_hp">
        </div>
    </div>
  <div class= "mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
      Asal Perusahaan 
    </label>
    <div class="col-sm-10">
    <select name="id_perusahaan" id="" class="col-sm-10">
      @foreach ($perusahaan as $p)
        <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
      @endforeach
    </select>
    </div>
</div>
<button type="submit" value="Submit">Submit</button>
</form>
    
@endsection