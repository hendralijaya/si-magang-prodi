<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyMagang extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_apply_magang_perusahaan';
    protected $fillable = [
        'nim',
        'id_perusahaan',
        'foto_mahasiswa',
        'formulir_pendaftaran_kerja_praktik',
        'surat_pengantar_kerja_praktik',
        'cv',
        'cover_letter',
        'tanggal_apply',
        'status_apply',
        'tanggal_respon'
    ];

    
}
