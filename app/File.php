<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title', 'url'
    ];

    public function user() 
    {
        return $this->belongsTo(Home::class);
    }
}
