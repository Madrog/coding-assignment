<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    /**
     * Get the Sacco associated to an individual
    */
    public function sacco()
    {
        return $this->belongsTo('App\Sacco');
    }

    /**
     * Get the transaction records associated with a particular individual
    */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
