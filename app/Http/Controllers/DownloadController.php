<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadKhs(Request $request,$id)
    {
        $file = 'khs/' . $id;
        return Storage::download($file);
    }

    public function downloadAsuransiKesehatan(Request $request,$id)
    {
        $file = 'asuransi_kesehatan/' . $id;
        return Storage::download($file);
    }

    public function downloadCoverLetter(Request $request,$id)
    {
        $file = 'dokumen_apply_magang/cover_letter/' . $id;
        return Storage::download($file);
    }

    public function downloadCV(Request $request,$id)
    {
        $file = 'dokumen_apply_magang/cv/' . $id;
        return Storage::download($file);
    }

    public function downloadFormulirPendaftaranKerjaPraktik(Request $request,$id)
    {
        $file = 'dokumen_apply_magang/formulir_pendaftaran_kerja_praktik/' . $id;
        return Storage::download($file);
    }

    public function downloadFotoMahasiswa(Request $request,$id)
    {
        $file = 'dokumen_apply_magang/foto_mahasiswa/' . $id;
        return Storage::download($file);
    }

    public function downloadSuratPengantarKerjaPraktik(Request $request,$id)
    {
        $file = 'dokumen_apply_magang/surat_pengantar_kerja_praktik/' . $id;
        return Storage::download($file);
    }

    public function downloadBukuAktivitasHarianKerjaPraktik(Request $request,$id)
    {
        $file = 'dokumen_magang/buku_aktivitas_harian_kerja_praktik/' . $id;
        return Storage::download($file);
    }

    public function downloadFormulirBimbinganKerjaPraktik(Request $request,$id)
    {
        $file = 'dokumen_magang/formulir_bimbingan_kerja_praktik/' . $id;
        return Storage::download($file);
    }

    public function downloadLaporanKerjaPraktik(Request $request,$id)
    {
        $file = 'dokumen_magang/laporan_kerja_praktik/' . $id;
        return Storage::download($file);
    }

    public function downloadSuratKeteranganBebasAkademik(Request $request,$id)
    {
        $file = 'dokumen_magang/surat_keterangan_bebas_akademik/' . $id;
        return Storage::download($file);
    }

    public function downloadMOA(Request $request,$id)
    {
        $file = 'dokumen_perusahaan/moa/' . $id;
        return Storage::download($file);
    }

    public function downloadMOU(Request $request,$id)
    {
        $file = 'dokumen_perusahaan/mou/' . $id;
        return Storage::download($file);
    }
}
