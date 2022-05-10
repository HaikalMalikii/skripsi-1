<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    public function JoinDetailForum ()
    {
        return $this->hasMany(DetailForum::class);
    }
    protected $table = 'forum';
}

