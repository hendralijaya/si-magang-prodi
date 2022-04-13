@extends('partials.main')
@section('container')
    <h3>Form Perusahaan</h3>
    <form action="{{ route('perusahaan.store') }}" method="post">
        @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="nama_perusahaan">
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Status Kerja Sama
        </label>
        
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="status_kerja_sama">
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Nomor Telpon
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="nomor_telepon">
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            Email Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="email_perusahaan">
        </div>
    </div>

    <div class= "mb-3 row">
        <label for=""  class="col-sm-2 col-form-label">
            MOA
        </label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="moa">
        </div>
    </div>

  <div class= "mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          MOU
      </label>
        <div class="col-sm-10">
      <input type="file" class="col-sm-10" name="email_perusahaan">
        </div>
  </div>

  <div class= "mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
        Provinsi
    </label>
    <div class="col-sm-10">
    <input type="text" class="col-sm-10" name="provinsi">
</div>
</div>

<div  class= "mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
        Kabupaten/Kota
    </label>
    <div class="col-sm-10">
    <input type="text" class="col-sm-10" name="kabupaten_kota">
</div>
</div>

<div class= "mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
        Kode Pos
    </label>
    <div class="col-sm-10">
    <input type="number" class="col-sm-10" name="kode_pos">
    </div>
</div>

<div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">
        Jalan
    </label>
    <div class="col-sm-10">
    <input type="text" class="col-sm-10" name="jalan">
</div>
</div>

<div class= "mb-3 row">

    <label for="" class="col-sm-2 col-form-label">
        Bidang Perusahaan
    </label>
    <div class="col-sm-10">
    <input type="text" class="col-sm-10" name="bidang_perusahaan[]">
</div>
<fieldset id="buildyourform">
</fieldset>
<input type="button" value="Tambahkan bidang perusahaan" class="add" id="add" />
<button type="submit" value="Submit">Submit</button>
</div>
<button type="submit" value="Submit">Submit</button>
</form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
<script>
        $(document).ready(function() {
            $("#add").click(function() {
                var lastField = $("#buildyourform div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"fieldwrapper md-3 row\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                var fName = $("<label class=\"fieldname col-sm-2 col-form-label\">Bidang Perusahaan</label>");
                var fType = $("<div class=\"col-sm-10\"><input type=\"text\" class=\"fieldname col-sm-2 col-form-label\" name=\"bidang_perusahaan\[\]\" />");
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
</script>
@endsection