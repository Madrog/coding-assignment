<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class IndividualResource extends Resource
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
            'id' =>  $this->id,
            'name' => $this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'gender' => $this->gender,
            'sacco' => $this->sacco->name,
            'totdep' => $this->transaction->where('type', 'deposit')->sum('amount')
        ];
    }
}
