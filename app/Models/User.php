<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     // many to many
     public function role()
     {
         return $this->belongsToMany(Role::class);
     }

     // one to one
     public function detail_user()
     {
         return $this->hasOne(DetailUser::class, 'user_id');
     }

     // one to many
     public function role_user()
     {
         return $this->hasMany(RoleUser::class, 'user_id');
     }

     public function mahasiswa()
     {
         return $this->hasOne(Mahasiswa::class, 'user_id');
     }


     public function dosen()
     {
         return $this->hasOne(Dosen::class, 'user_id');
     }
}
