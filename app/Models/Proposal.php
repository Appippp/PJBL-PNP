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
        'judul_proposal',
        'file_proposal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id','id');
    }

    public function mitra()
    {
        return $this->hasMany(Mitra::class, 'proposal_id');
    }

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'proposal_id');
    }

    public function dosen_pembimbing()
    {
        return $this->hasMany(DosenPembimbing::class, 'proposal_id');
    }

    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class, 'proposal_id');
    }

    public function detail_proposal()
    {
        return $this->hasMany(DetailProposal::class, 'proposal_id');
    }
}
