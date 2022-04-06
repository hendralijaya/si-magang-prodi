<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'bidang_perusahaan';
    protected $fillable = [
        'id_perusahaan',
        'bidang_perusahaan'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
