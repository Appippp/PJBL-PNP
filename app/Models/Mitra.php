<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mitra extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'mitra';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proposal_id',
        'nama_mitra',
        'alamat',
        'kontak',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }

    public function detail_proposal()
    {
        return $this->hasMany(DetailProposal::class, 'mitra_id');
    }

}
