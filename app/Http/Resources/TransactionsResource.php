<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TransactionsResource extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $name = $this->individual->first_name.' '.$this->individual->last_name;
 
        return [
            'id' => $this->id,
            'name' => $name,
            'sacco' => $this->sacco[0]->name,
            'amount' => $this->amount,
            'type' => $this->type
        ];
    }

}
