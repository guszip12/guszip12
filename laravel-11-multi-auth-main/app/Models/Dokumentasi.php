<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = "dokumentasis"; // Nama tabel di database

    protected $fillable = [
        'gambar', // Nama kolom untuk gambar
        'deskripsi', // Nama kolom untuk deskripsi
        'jenis', // Nama kolom untuk jenis dokumentasi
    ];

}
