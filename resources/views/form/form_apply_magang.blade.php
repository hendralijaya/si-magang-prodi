@extends('partials.main') @section('container')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>Form Apply Magang</h3>
<form action="{{ route('mahasiswa.storeApplyMagang') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Foto Mahasiswa </label>
        <div class="col-sm-10">
            <input
                type="file"
                class="col-sm-10"
                name="foto_mahasiswa"
                accept="image/png, image/jpeg"
            />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Formulir Pendaftaran Kerja Praktik
        </label>
        <div class="col-sm-10">
            <input
                type="file"
                class="col-sm-10"
                name="formulir_pendaftaran_kerja_praktik"
            />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Surat Pengantar Kerja Praktik
        </label>
        <div class="col-sm-10">
            <input
                type="file"
                class="col-sm-10"
                name="surat_pengantar_kerja_praktik"
            />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">CV</label>
        <div class="col-sm-10">
            <input type="file" class="col-sm-10" name="cv" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Cover Letter</label>
        <div class="col-sm-10">
            <input type="file" class="col-sm-10" name="cover_letter" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Tanggal Apply</label>
        <div class="col-sm-10">
            <input type="date" class="col-sm-10" name="tanggal_apply" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Status Apply</label>
        <div class="col-sm-10">
            <select name="status_apply" class="col-sm-10">
                <option value="ACC">Accept</option>
                <option value="REJ">Reject</option>
                <option value="N/A">Unknown</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">Tanggal Respon</label>
        <div class="col-sm-10">
            <input type="date" class="col-sm-10" name="tanggal_respon" />
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
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Nomor Telepon </label>
        <div class="col-sm-10">
            <input type="number" class="col-sm-10" name="nomor_telepon" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Email Perusahaan </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="email_perusahaan" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Provinsi Perusahaan
        </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="provinsi" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Kabupaten/Kota Perusahaan
        </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="kabupaten_kota" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label">
            Kode Pos Perusahaan
        </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="kode_pos" />
        </div>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-2 col-form-label"> Jalan Perusahaan </label>
        <div class="col-sm-10">
            <input type="text" class="col-sm-10" name="jalan" />
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
