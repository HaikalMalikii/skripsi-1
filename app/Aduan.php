<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    //
    protected $table = 'pengaduan';
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
