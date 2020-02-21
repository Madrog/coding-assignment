<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SaccosResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [  
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'totdep' => $this->transactions->where('type', 'deposit')->sum('amount'),
            'totwith' => $this->transactions->where('type', 'withdrawal')->sum('amount'),
            
            'totnet' => 0,
            'totdepmen' => 0,
            'totdepwomen' => 0,
            'totwithmen' => 0,
            'totwithwomen' => 0
        ];
    }
}
