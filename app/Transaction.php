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

    /**
     * Get the individual male record associated with one transaction
    */
    public function male()
    {
        return $this->belongsTo('App\Individual')->where('gender', 'Male');
    }

    /**
     * Get the individual female record associated with one transaction
    */
    public function female()
    {
        return $this->belongsTo('App\Individual')->where('gender', 'Female');
    }
}
