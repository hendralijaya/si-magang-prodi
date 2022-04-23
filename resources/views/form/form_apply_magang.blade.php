<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Form Apply Magang</title>
  </head>
  <body>
    <h3>Form Apply Magang</h3>
    <form action="{{ route('mahasiswa.storeApplyMagang') }}" method="POST">
      @csrf
      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
        Foto Mahasiswa 
        </label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="foto_mahasiswa"
        accept="image/png, image/jpeg">
        @error('foto_mahasiswa')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
          Formulir Pendaftaran Kerja Praktik
        </label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="formulir_pendaftaran_kerja_praktik">
        @error('formulir_pendaftaran_kerja_praktik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>  
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
          Surat Pengantar Kerja Praktik
        </label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="surat_pengantar_kerja_praktik">
        @error('surat_pengantar_kerja_praktik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">CV</label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="cv">
        @error('cv')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>   
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Cover Letter</label>
        <div class="col-sm-10">
        <input type="file" class="col-sm-10" name="cover_letter">
        @error('cover_letter')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Tanggal Apply:</label>
        <div class="col-sm-10">
        <input type="date" class="col-sm-10" name="tanggal_apply">
        @error('tanggal_apply')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="cars" class="col-sm-2 col-form-label">Status Apply:</label>
        @error('status_apply')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        <select name="status_apply">
          <option value="ACC">Accept</option>
          <option value="REJ">Reject</option>
          <option value="N/A">Unknown</option>
        </select>
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Tanggal Respon:</label>
        <div class="col-sm-10">
        <input type="date" class="col-sm-10" name="tanggal_respon">
        @error('tanggal_respon')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Nama Perusahaan : </label>
        <select name="id_perusahaan" id="">
          <option value=""></option>
          @foreach ($perusahaan as $p)
            <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
          @endforeach
        </select>
      </div>
      <h6>Jika perusahaan tidak ada di dropdown maka isi dibawah ini dan kosongkan dropdown</h6>
      <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Nama Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="nama_perusahaan">
        @error('nama_perusahaan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Status Kerja Sama
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="status_kerja_sama">
        @error('status_kerja_sama')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
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

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Email Perusahaan
        </label>
        <div class="col-sm-10">
        <input type="text" class="col-sm-10" name="email_perusahaan">
        @error('email_perusahaan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          Provinsi Perusahaan
      </label>
      <div class="col-sm-10">
      <input type="text" class="col-sm-10" name="provinsi">\
      @error('provinsi')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
      @enderror
      </div>
    </div>

    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          Kabupaten/Kota Perusahaan
      </label>
      <div class="col-sm-10">
      <input type="text" class="col-sm-10" name="kabupaten_kota">
      @error('kabupaten_kota')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
      @enderror
      </div>
    </div>

    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          Kode Pos Perusahaan
      </label>
      <div class="col-sm-10">
      <input type="text" class="col-sm-10" name="kode_pos">
      @error('kode_pos)
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
      @enderror
      </div>
    </div>

    <div class="mb-3 row">
      <label for="" class="col-sm-2 col-form-label">
          Jalan Perusahaan
      </label>
      <div class="col-sm-10">
      <input type="text" class="col-sm-10" name="jalan">
      @error('jalan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
      @enderror
      </div>
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
  </body>
</html>