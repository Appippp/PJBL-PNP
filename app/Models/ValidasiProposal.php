<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidasiProposal extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'validasi_proposal';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proposal_id',
        'mitra_id',
        'anggota_id',
        'dospem_d',
        'validasi_dospem',
        'validasi_pimpinan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(AnggotaKelompok::class, 'anggota_id', 'id');
    }

    public function dospem()
    {
        return $this->belongsTo(DosenPembimbing::class, 'dospem_d', 'id');
    }

    
}
