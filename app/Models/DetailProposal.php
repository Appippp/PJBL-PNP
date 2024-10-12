<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailProposal extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_proposal';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proposal_id',
        'dospem_id',
        'kaprodi_id',
        'mitra_id',
        'kelompok_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function dosen_pembimbing()
    {
        return $this->belongsTo(DosenPembimbing::class, 'dospem_id', 'id');
    }


    public function kaprodi()
    {
        return $this->belongsTo(Kaprodi::class, 'kaprodi_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id');
    }

    public function anggota_kelompok()
    {
        return $this->belongsTo(AnggotaKelompok::class, 'kelompok_id', 'id');
    }
}
