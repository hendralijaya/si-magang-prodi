@extends('partials.main')
@section('container')
<div class="container" style="margin-top: 20px; margin-bottom:20px">
    <h3 style="margin-bottom: 20px">Form Magang</h3>
    <form action="{{ route('mahasiswa.storeMagang') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
            Tanggal Pengambilan :
            </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_pengambilan">
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
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tahun_ajaran">
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
            <div class="col-sm-10">
                <input type="number" class="form-control" name="semester">
                @error('semester')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Laporan Kerja Praktik
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="laporan_kerja_praktik">
                @error('laporan_kerja_praktik')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Formulir Bimbingan Kerja Praktik
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="formulir_bimbingan_kerja_praktik">
                @error('formulir_bimbingan_kerja_praktik')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Buku Aktivitas Harian Kerja Praktik
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="buku_aktivitas_harian_kerja_praktik">
                @error('buku_aktivitas_harian_kerja_praktik')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                Surat Keterangan Bebas Akademik
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="surat_keterangan_bebas_akademik">
                @error('surat_keterangan_bebas_akademik')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Mentor : </label>
            <div class="col-sm-10">
                @error('id_mentor')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
                <select name="id_mentor" id="" class="form-select">
                    <option value=""></option>
                @foreach ($mentor as $m)
                <option value="{{ $m->id_mentor }}">{{ $m->nama_mentor }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <h6>
            Jika mentor tidak ada di dropdown maka isi dibawah ini dan kosongkan
            dropdown
        </h6>
        <br>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Nama Perusahaan : </label>
            <div class="col-sm-10">
                @error('id_perusahaan')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
                <select name="id_perusahaan" id="" class="form-select">
                    <option value=""></option>
                @foreach ($perusahaan as $p)
                <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
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

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
                No HP
            </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="no_hp">
                @error('no_hp')
                <div class="alert alert-danger col-sm-10">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">
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

        <div class="submit-button  d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        </div>
    </form>
</div>
@endsection
