<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'status_kerja_sama',
        'nomor_telepon',
        'email_perusahaan',
        'moa',
        'mou'
    ];

    public function alamat_perusahaan()
    {
        return $this->hasOne(AlamatPerusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function bidang_perusahaan()
    {
        return $this->hasMany(BidangPerusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function mentor()
    {
        return $this->hasMany(Mentor::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_apply_magang_perusahaan', 'id_perusahaan', 'nim');
    }
    public function getRouteKeyName()
    {
        return 'id_perusahaan';
    }
}
