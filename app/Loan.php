<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    public static function scopeLoans($query)
    {
        return $query->get();
    }
}
