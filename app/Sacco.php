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

    /**
     * Get the Individual records associated with a particular SACCO
    */
    public function males()
    {
        return $this->hasMany('App\Individual')->where('gender', 'Male');
    }

    /**
     * Get the Individual records associated with a particular SACCO
    */
    public function females()
    {
        return $this->hasMany('App\Individual')->where('gender', 'Female');
    }

    /**
     * Get the Individual records associated with a particular SACCO
    */
    public function transactions()
    {
        return $this->hasManyThrough('App\Transaction', 'App\Individual',
        'sacco_id', // Foreign key on Individuals table...
        'individual_id', // Foreign key on Transactions table...
        'id', // Local key on saccos table...
        'id' // Local key on Individuals table...
        );
    }
}
