<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proposal extends Model
{
    // use HasFactory;
    use SoftDeletes;


    protected $table = 'proposal';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mahasiswa_id',
        'skema_id',
        'judul',
        'upload',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dosen_pembimbing()
    {
        return $this->hasMany(DosenPembimbing::class, 'proposal_id');
    }

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'proposal_id');
    }

    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'proposal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id', 'id');
    }

    public function validasi_proposal()
    {
        return $this->hasMany(ValidasiProposal::class, 'proposal_id');
    }
}
