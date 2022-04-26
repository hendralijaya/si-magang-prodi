<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'alamat_mahasiswa';
    public $timestamps = false;
    protected $fillable = [
        'nim',
        'provinsi',
        'kabupaten_kota',
        'kode_pos',
        'jalan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
