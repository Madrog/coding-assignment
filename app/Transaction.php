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

    
    /**
     * Get the Individual records associated with a particular SACCO
    */
    public function sacco()
    {
        return $this->hasManyThrough('App\Sacco', 'App\Individual',
        'id', // Foreign key on Individuals table...
        'id', // Foreign key on Transactions table...
        'individual_id', // Local key on saccos table...
        'sacco_id' // Local key on Individuals table...
        );
    }
}
