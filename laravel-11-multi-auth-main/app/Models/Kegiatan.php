<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_kegiatan',
        'tanggal_berakhir',
        'surat_kegiatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
