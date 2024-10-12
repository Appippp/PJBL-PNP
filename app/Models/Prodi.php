<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'prodi';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable =[
        'kode_prodi',
        'nama_prodi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function detail_user()
    {
        return $this->hasMany(DetailUser::class, 'prodi_id');
    }

    public function skema()
    {
        return $this->hasMany(Skema::class, 'prodi_id');
    }



}
