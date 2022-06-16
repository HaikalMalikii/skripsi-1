<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    //
    protected $table = 'komentar';
    public function User ()
    {
        return $this->belongsTo(User::class);
    }
    public function DetailForum ()
    {
        return $this->belongsTo(DetailForum::class);
    }
}
