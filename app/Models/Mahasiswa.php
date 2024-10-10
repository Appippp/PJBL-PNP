<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'mahasiswa';

    protected $dates = [
        'created_at',
        'updated_at',
        'delete_at'
    ];

    protected $fillable = [
        'user_id',
        'prodi_id',
        'nim',
        'nama_mahasiswa',
        'tahun_masuk',
        'jk',
        'no_telp',
        'alamat',
        'created_at',
        'updated_at',
        'delete_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'mahasiswa_id', 'id');
    }

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'ketua_id', 'id');
    }

    public function anggota_kelompok()
    {
        return $this->hasMany(AnggotaKelompok::class, 'anggota_id');
    }
}
