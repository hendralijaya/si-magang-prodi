@extends('partials.main')
@section('container')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h3>Form Magang</h3>
    <form action="{{ route('mahasiswa.storeMagang') }}" method="POST" enctype="multipart/form-data">
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
            <input type="number" name="tahun_ajaran">
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
        <div>
            <label for="">Nama Dosen : </label>
            <select name="nik" id="">
            @foreach ($dosen as $d)
              <option value="{{ $d->nik }}">{{ $d->nama_dosen }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" value="Submit">Submit</button>
    </form>
@endsection