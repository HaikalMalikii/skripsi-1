<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    } 

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    public function aduan()
    {
        return $this->hasMany(Aduan::class);
        
    }
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
    public function RoleUser()
    {
        return $this->hasOne(RoleUser::class);
    }
    public function hasRole($role) 
    {
    return $this->roles()->where('name', $role)->count() == 1;
    }


}
