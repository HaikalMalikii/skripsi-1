<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $table = 'forum';

    public function JoinUserForum ()
    {
        return $this->hasOne(User::class);
    }
    public function JoinDetailForum ()
    {
        return $this->hasOne(DetailForum::class);
    }
}

