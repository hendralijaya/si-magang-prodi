<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPerusahaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alamat_perusahaan';
    protected $fillable = [
        'id_perusahaan',
        'provinsi',
        'kabupaten_kota',
        'kode_pos',
        'jalan'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
