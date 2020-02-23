<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'transactions';

    public $fillable = ['individual_id', 'amount', 'type' ];

    /**
     * Get the individual record associated with one transaction
    */
    public function individual()
    {
        return $this->belongsTo('App\Individual');
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
