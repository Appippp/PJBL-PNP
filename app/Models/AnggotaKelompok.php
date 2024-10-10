<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaKelompok extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'anggota_kelompok';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kelompok_id',
        'anggota_id', // berlasi kemahasiswa menjadi anggota
        'notifikasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'anggota_id', 'id');
    }
}
