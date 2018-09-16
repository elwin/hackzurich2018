<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $guarded = [];
    protected $casts = [
        'preferred' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }
}
