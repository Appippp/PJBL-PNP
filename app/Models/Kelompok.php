<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelompok extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $table = 'kelompok';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'proposal_id',
        'ketua_id', // diambil dari table mahasiswa
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'ketua_id', 'id');
    }

    public function anggota_kelompok()
    {
        return $this->hasMany(AnggotaKelompok::class, 'kelompok_id');
    }


}
