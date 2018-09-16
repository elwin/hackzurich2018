<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{

    protected $with = ['street'];
    protected $casts = [
        'polyline' => 'json'
    ];
    protected $guarded = [];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }
}
