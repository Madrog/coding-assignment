<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    /**
     * Get the individual record associated with one transaction
    */
    public function individual()
    {
        return $this->belongsTo('App\Individual');
    }
}
