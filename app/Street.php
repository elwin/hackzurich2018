<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $guarded = [];

    public function trips()
    {
        return $this->hasMany(Segment::class);
    }
}
