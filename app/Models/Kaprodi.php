<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kaprodi extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'kaprodi';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proposal_id',
        'dosen_id',
        'validasi_kaprodi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }

    public function detail_proposal()
    {
        return $this->hasMany(DetailProposal::class, 'kaprodi_id');
    }
}
