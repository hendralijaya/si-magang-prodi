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
      <div>
        <label for="">
        Foto Mahasiswa 
        </label>
        <input type="file" name="foto_mahasiswa"
        accept="image/png, image/jpeg">
      </div>
      
      <div>
        <label for="">
          Formulir Pendaftaran Kerja Praktik
        </label>
          <input type="file" name="formulir_pendaftaran_kerja_praktik">  
      </div>

      <div>
        <label for="">
          Surat Pengantar Kerja Praktik
        </label>
          <input type="file" name="surat_pengantar_kerja_praktik">
      </div>

      <div>
        <label for="">CV</label>
        <input type="file" name="cv">   
      </div>

      <div>
        <label for="">Cover Letter</label>
          <input type="file" name="cover_letter">
      </div>

      <div>
        <label for="">Tanggal Apply:</label>
          <input type="date" name="tanggal_apply">
      </div>
      
      <div>
        <label for="cars">Status Apply:</label>

        <select name="status_apply">
          <option value="ACC">Accept</option>
          <option value="REJ">Reject</option>
          <option value="N/A">Unknown</option>
        </select>
      </div>

      <div>
        <label for="">Tanggal Respon:</label>
          <input type="date" name="tanggal_respon">
      </div>
      <div>
        <label for="">Nama Perusahaan : </label>
        <select name="id_perusahaan" id="">
          <option value=""></option>
          @foreach ($perusahaan as $p)
            <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
          @endforeach
        </select>
      </div>
      <h6>Jika perusahaan tidak ada di dropdown maka isi dibawah ini dan kosongkan dropdown</h6>
      <div>
        <label for="">
            Nama Perusahaan
        </label>
        <input type="text" name="nama_perusahaan">
    </div>

    <div>
        <label for="">
            Status Kerja Sama
        </label>
        <input type="text" name="status_kerja_sama">
    </div>

    <div>
        <label for="">
            Nomor Telepon
        </label>
        <input type="number" name="nomor_telepon">
    </div>

    <div>
        <label for="">
            Email Perusahaan
        </label>
        <input type="text" name="email_perusahaan">
    </div>

    <div>
      <label for="">
          Provinsi Perusahaan
      </label>
      <input type="text" name="provinsi">
    </div>

    <div>
      <label for="">
          Kabupaten/Kota Perusahaan
      </label>
      <input type="text" name="kabupaten_kota">
    </div>

    <div>
      <label for="">
          Kode Pos Perusahaan
      </label>
      <input type="text" name="kode_pos">
    </div>

    <div>
      <label for="">
          Jalan Perusahaan
      </label>
      <input type="text" name="jalan">
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