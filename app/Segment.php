<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{

    protected $casts = [
        'polyline' => 'json'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
