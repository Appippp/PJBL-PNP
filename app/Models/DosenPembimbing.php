<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenPembimbing extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'dosen_pembimbing';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proposal_id',
        'dospem_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'dospem_id', 'id');
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function dosen_pembimbing()
    {
        return $this->hasMany(DosenPembimbing::class, 'dospem_id');
    }

    public function validasi_proposal()
    {
        return $this->hasMany(ValidasiProposal::class, 'dospem_id');
    }

}
