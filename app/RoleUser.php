<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    //
    protected $table = 'role_users';
    public function roles()
    {
      return $this->hasOne(Role::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);   
    }

}
