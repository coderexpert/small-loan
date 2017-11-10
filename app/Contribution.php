<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    //

    public static function scopeContributions($query)
    {
        return $query->get();
    }
}
