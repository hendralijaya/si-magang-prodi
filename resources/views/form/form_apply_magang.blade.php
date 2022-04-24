@extends('partials.main') 
@section('container')
<h3>Form Apply Magang</h3>
<form action="{{ route('mahasiswa.storeApplyMagang') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Foto Mahasiswa </label>
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
        <label for="" class="col-sm-2 col-form-label">Tanggal Apply</label>
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
        <label for="cars" class="col-sm-2 col-form-label">Status Apply</label>
        @error('status_apply')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        <div class="col-sm-10">
        <select name="status_apply" id="" class="col-sm-10">
          <option value="ACC">Accept</option>
          <option value="REJ">Reject</option>
          <option value="N/A">Unknown</option>
        </select>
    </div>
      </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Tanggal Respon</label>
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
        <label for="" class="col-sm-2 col-form-label">Nama Perusahaan</label>
        <div class="col-sm-10">
            <select name="id_perusahaan" id="" class="col-sm-10">
                <option value=""></option>
                @foreach ($perusahaan as $p)
                <option value="{{ $p->id_perusahaan }}">
                    {{ $p->nama_perusahaan }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <h6>
        Jika perusahaan tidak ada di dropdown maka isi dibawah ini dan kosongkan
        dropdown
    </h6>
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Nama Perusahaan </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="nama_perusahaan" />
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
            <select name="status_kerja_sama" id="" class="col-sm-10">
                <option value="">Belum Ada</option>
                <option value="MOA">MOA</option>
                <option value="MOU">MOU</option>
            </select>
        @error('status_kerja_sama')
            <div class="alert alert-danger col-sm-10">
                <small>{{ $message }}</small>
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Nomor Telepon </label>
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
        <label for="" class="col-sm-2 col-form-label"> Email Perusahaan </label>
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
      <input type="text" class="col-sm-10" name="provinsi">
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
      @error('kode_pos')
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
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Bidang Perusahaan
            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Teknologi"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Teknologi
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Transportasi"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Transportasi
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Properti"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Properti
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Marketing"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Marketing
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Keuangan"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Keuangan
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Peternakan"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Peternakan
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Kontraktor"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Kontraktor
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Jasa Konsultan"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Jasa Konsultan
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Survei"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Survei
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Fashion"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Fashion
                </label>
            </div>

            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Arsitektur"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Arsitektur
                </label>
            </div>
            <div class="col-sm-10 form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="Migas"
                    name="bidang_perusahaan[]"
                    id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                    Migas
                </label>
            </div>
        </label>
    </div>
    <button type="submit" value="Submit">Submit</button>
</form>
@endsection
