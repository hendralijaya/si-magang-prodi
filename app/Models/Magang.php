<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;
    protected $table = 'magang';
    protected $fillable = [
        'id_magang',
        'tanggal_pengambilan',
        'nilai_magang_angka',
        'tahun_ajaran',
        'semester',
        'nilai_magang_huruf',
        'laporan_kerja_praktik',
        'formulir_bimbingan_kerja_praktik',
        'buku_aktivitas_harian_kerja_praktik',
        'surat_keterangan_bebas_akademik',
        'nim',
        'nik'
    ];
}
