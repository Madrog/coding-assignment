<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sacco extends Model
{
    /**
     * Get the Individual records associated with a particular SACCO
    */
    public function individuals()
    {
        return $this->hasMany('App\Individual');
    }
}
