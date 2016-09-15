<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
