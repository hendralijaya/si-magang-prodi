<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    use HasFactory;
    protected $fillable = [
        'id_provinsi',
        'nama_provinsi'
    ];
}
