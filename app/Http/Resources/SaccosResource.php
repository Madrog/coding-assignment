<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Transaction;

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
        $totdep = $this->transactions->where('type', 'deposit')->sum('amount');
        $totwith = $this->transactions->where('type', 'withdrawal')->sum('amount');
        $totnet = $totdep - $totwith;

        //$coll = collect(IndividualResource::collection($this->individuals));

        $males = collect(IndividualResource::collection($this->individuals->where('gender', 'Male')));
        $females =  collect(IndividualResource::collection($this->individuals->where('gender', 'Female')));

        $totdepmen = $males->sum('totdep');; //$males;
        $totdepwomen = $females->sum('totdep');; //$females;

        $totwithmen = $males->sum('totwith');
        $totwithwomen = $females->sum('totwith');

        return [  
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'totdep' => $totdep,
            'totwith' => $totwith,           
            'totnet' => $totnet,
            'totdepmen' => $totdepmen,
            'totdepwomen' => $totdepwomen,
            'totwithmen' => $totwithmen,
            'totwithwomen' => $totwithwomen
        ];
    }
}
