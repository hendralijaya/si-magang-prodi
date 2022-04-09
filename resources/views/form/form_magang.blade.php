<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Magang</title>
  </head>
  <body>
    <h3>Form Magang</h3>
    <form action="{{ route('mahasiswa.storeMagang') }}" method="POST">
        @csrf
        <div>
            <label for="">
            Tanggal Pengambilan :
            </label>
            <input type="date" name="tanggal_pengambilan">
        </div>

        <div>
            <label for="">
                Tahun Ajaran
            </label>
            <input type="text" name="tahun_ajaran">
        </div>

        <div>
            <label for="">
                Semester
            </label>
            <input type="number" name="semester">
        </div>

        <div>
            <label for="">
                Laporan Kerja Praktik
            </label>
            <input type="file" name="laporan_kerja_praktik">
        </div>

        <div>
            <label for="">
                Formulir Bimbingan Kerja Praktik
            </label>
            <input type="file" name="formulir_bimbingan_kerja_praktik">
        </div>

        <div>
            <label for="">
                Buku Aktivitas Harian Kerja Praktik
            </label>
            <input type="file" name="buku_aktivitas_harian_kerja_praktik">
        </div>

        <div>
            <label for="">
                Surat Keterangan Bebas Akademik
            </label>
            <input type="file" name="surat_keterangan_bebas_akademik">
        </div>
        <div>
            <label for="">
                Nama Mentor
            </label>
            <input type="text" name="nama_mentor">
        </div>

        <div>
            <label for="">
                No HP
            </label>
            <input type="number" name="no_hp">
        </div>

        <div>
            <label for="">
                Email Mentor
            </label>
            <input type="text" name="email_mentor">
        </div>
        <div>
            <label for="">Nama Perusahaan : </label>
            <select name="id_perusahaan" id="">
            @foreach ($perusahaan as $p)
              <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
            @endforeach
            </select>
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