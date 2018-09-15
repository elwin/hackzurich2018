<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
