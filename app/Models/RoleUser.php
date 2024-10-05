<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
     // use HasFactory;
     use SoftDeletes;

     // declare table name
     public $table = 'role_user';

     // this field must type date yyyy-mm-dd hh:mm:ss
     protected $dates = [
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     // declare fillable fields
     protected $fillable = [
         'role_id',
         'user_id',
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     // one to many
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id', 'id');
     }

     public function role()
     {
         return $this->belongsTo(Role::class, 'role_id', 'id');
     }
}
