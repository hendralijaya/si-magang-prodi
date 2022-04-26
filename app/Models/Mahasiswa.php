<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'Mahasiswa';
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'no_hp',
        'jurusan',
        'khs',
        'peminatan',
        'tahun_angkatan',
        'asuransi_kesehatan',
        'id_user'
    ];

    public function alamat_mahasiswa()
    {
        return $this->hasOne(AlamatMahasiswa::class, 'nim', 'nim');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function perusahaan()
    {
        return $this->belongsToMany(Perusahaan::class, 'mahasiswa_apply_magang_perusahaan', 'nim', 'id_perusahaan');
    }
}
