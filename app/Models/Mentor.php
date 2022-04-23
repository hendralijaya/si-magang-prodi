<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mentor';
    protected $fillable = [
        'id_mentor',
        'nama_mentor',
        'no_hp',
        'email_mentor',
        'id_perusahaan'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
