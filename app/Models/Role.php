<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // use HasFactory;
      // use HasFactory;
      use SoftDeletes;

      // declare table name
      public $table = 'role';

      // this field must type date yyyy-mm-dd hh:mm:ss
      protected $dates = [
          'created_at',
          'updated_at',
          'deleted_at',
      ];

      // declare fillable fields
      protected $fillable = [
          'title',
          'created_at',
          'updated_at',
          'deleted_at',
      ];

      // many to many
      public function user()
      {
          return $this->belongsToMany(User::class);
      }

      public function permission()
      {
          return $this->belongsToMany(Permission::class);
      }

      // one to many
      public function role_user()
      {
          return $this->hasMany(RoleUser::class, 'role_id');
      }

      public function permission_role()
      {
          return $this->hasMany(PermissionRole::class, 'role_id');
      }
}
