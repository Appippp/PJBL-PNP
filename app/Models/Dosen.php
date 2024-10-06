<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    // use HasFactory;
    use softDeletes;

    protected $table = 'dosen';

    protected $dates = [
        'create_at',
        'update_at',
        'delete_at',
    ];

    protected $fillable =
    [
        'user_id',
        'prodi_id',
        'nidn',
        'nama_dosen',
        'jk',
        'no_telp',
        'alamat',
        'create_at',
        'update_at',
        'delete_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
