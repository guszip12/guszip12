<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nomor_registrasi',
        'ktp',
        'name',
        'alamat',
        'hp',
        'email',
        'username',
        'password',
        'asal_sekolah',
        'school_name',
        'surat_kpl',
        'surat_kesbangpol',
        'foto',       
        'bidang',
        'name_seksi',
        'name_pembina',
        'jadwal_presentasi',
        'jam_presentasi',
        'topik_presentasi',
        'ruangan',
        'nilai',
        'rekap_laporan',
        'tgl_mulai',
        'tgl_selesai',
        'registration_number',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
