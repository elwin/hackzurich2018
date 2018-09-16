<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $guarded = [];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
