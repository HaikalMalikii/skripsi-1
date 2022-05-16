<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailForum extends Model
{
    
    //
    protected $table = 'detailforum';

    public function Forum ()
    {
        return $this->belongsTo(Forum::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
