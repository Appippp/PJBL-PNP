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
        'dosen_id',
        'validasi_dospem',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function detail_proposal()
    {
        return $this->hasMany(DetailProposal::class, 'dospem_id');
    }

}
