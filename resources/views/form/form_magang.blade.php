@extends('partials.main')
@section('container')
    <h3>Form Magang</h3>
    <form action="{{ route('mahasiswa.storeMagang') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
            Tanggal Pengambilan :
            </label>
            <div class= "col-sm-10">
            <input type="date" class="col-sm-10" name="tanggal_pengambilan">
            @error('tanggal_pengambilan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Tahun Ajaran
            </label>
            <div class= "col-sm-10">
            <input type="text" class="col-sm-10" name="tahun_ajaran">
            @error('tahun_ajaran')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Semester
            </label>
            <input type="number" class="col-sm-10" name="semester">
            @error('semester')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Laporan Kerja Praktik
            </label>
            <input type="file" class="col-sm-10" name="laporan_kerja_praktik">
            @error('laporan_kerja_praktik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Formulir Bimbingan Kerja Praktik
            </label>
            <input type="file" class="col-sm-10" name="formulir_bimbingan_kerja_praktik">
            @error('formulir_bimbingan_kerja_praktik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Buku Aktivitas Harian Kerja Praktik
            </label>
            <input type="file" class="col-sm-10" name="buku_aktivitas_harian_kerja_praktik">
            @error('buku_aktivitas_harian_kerja_praktik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Surat Keterangan Bebas Akademik
            </label>
            <input type="file" class="col-sm-10" name="surat_keterangan_bebas_akademik">
            @error('surat_keterangan_bebas_akademik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Nama Mentor
            </label>
            <input type="text" class="col-sm-10" name="nama_mentor">
            @error('nama_mentor')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                No HP
            </label>
            <input type="number" class="col-sm-10" name="no_hp">
            @error('no_hp')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Email Mentor
            </label>
            <input type="text" class="col-sm-10" name="email_mentor">
            @error('email_mentor')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Perusahaan : </label>
            @error('id_perusahaan')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <select name="id_perusahaan" id="">
            @foreach ($perusahaan as $p)
              <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
            @endforeach
            </select>
        </div>

        <div>
            <label for="">Nama Dosen : </label>
            @error('nik')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <select name="nik" id="">
            @foreach ($dosen as $d)
              <option value="{{ $d->nik }}">{{ $d->nama_dosen }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="col-sm-10" value="Submit">Submit</button>
    </form>
@endsection 