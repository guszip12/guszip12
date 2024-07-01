<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanPkl extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_pkl'; // Nama tabel yang terkait dengan model ini

    protected $fillable = [
        'gambar',
        'deskripsi',
    ];
}
