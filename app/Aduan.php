<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
class Aduan extends Model
{
    // use HasFactory;
    //
    protected $table = 'pengaduan';
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    
}
