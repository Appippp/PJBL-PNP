<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skema extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'skema';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pimpinan_id',
        'prodi_id',
        'kode_skema',
        'nama_skema',
        'tgl_mulai',
        'tgl_selesai',
        'tahun',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'skema_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pimpinan_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
