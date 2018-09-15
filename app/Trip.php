<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
