<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    //
    public function User ()
    {
        return $this->belongsTo(User::class);
    }
    public function DetailForum ()
    {
        return $this->belongsTo(DetailForum::class);
    }
}
