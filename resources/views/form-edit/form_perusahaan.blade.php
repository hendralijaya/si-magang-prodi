@extends('partials.main')
@section('container')
<div class="container"  style="margin-top: 20px; margin-bottom: 20px">
    <h3  style="margin-top: 20px; margin-bottom: 20px">Form Perusahaan</h3>
    <form action="{{ route('perusahaan.update', $perusahaan->id_perusahaan) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_perusahaan" disabled value="{{ $perusahaan->nama_perusahaan }}">
        @error('nama_perusahaan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
          Status Kerja Sama
        </label>
        <div class="col-sm-10">
        <select name="status_kerja_sama" id="" class="form-select">
            <option value="" {{ $perusahaan->status_kerja_sama == '' ? 'selected' : ''}}>Belum Ada</option>
            <option value="MOA" {{ $perusahaan->status_kerja_sama == 'MOA' ? 'selected' : ''}}>MOA</option>
            <option value="MOU" {{ $perusahaan->status_kerja_sama == 'MOU' ? 'selected' : ''}}>MOU</option>
        </select>
        @error('status_kerja_sama')
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
        <input type="number" class="form-control" name="nomor_telepon" value="{{ $perusahaan->nomor_telepon }}">
        @error('nomor_telepon')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Email Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="email" class="form-control" name="email_perusahaan" value="{{ $perusahaan->email_perusahaan  }}">
        @error('email_perusahaan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>


    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            MOA
        </label>
        <div class="col-sm-10">
        <input type="hidden" name='oldmoa' value='{{ $perusahaan->moa }}'>
        <input type="file" class="form-control" name="moa">
        </div>
    </div>

  <div class= "mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          MOU
      </label>
        <div class="col-sm-10">
            <input type="hidden" name='oldmou' value='{{ $perusahaan->mou }}'>
            <input type="file" class="form-control" name="mou">
        </div>
  </div>

{{-- DROPDOWN MULTISELECT --}}
{{-- <div class= "mb-3 row">



    <label for="" class="col-sm-2 col-form-label">
        Bidang Perusahaan
    </label>
    <div class="col-sm-10">
    <input type="text" class="col-sm-10" name="bidang_perusahaan[]">
</div> --}}

<div class="submit-button  d-flex justify-content-end">
    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</div>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    {{-- <div></div> --}}
{{-- <script>
        $(document).ready(function() {
            $("#add").click(function() {
                var lastField = $("#buildyourform div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"fieldwrapper md-3 row flex\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<label class=\"fieldname col-sm-2 col-form-label\">Bidang Perusahaan</label>");
                var fType = $("<div class=\"col-sm-10 flex\"><input type=\"text\" class=\"fieldname col-sm-2 col-form-label\" name=\"bidang_perusahaan\[\]\" />");
                var removeButton = $("<input type=\"button\" class=\"remove btn btn-danger\" value=\"-\" /></div>");
                removeButton.click(function() {
                    $(this).parent().remove();
                });
                fieldWrapper.append(fName);
                fieldWrapper.append(fType);
                fieldWrapper.append(removeButton);
                $("#buildyourform").append(fieldWrapper);
            });
        });
</script> --}}
@endsection
