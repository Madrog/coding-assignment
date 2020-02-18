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
        $collections = collect($this->transactions);

        $deposits = $collections->where('type', 'deposit');
        $withdrawals = $collections->where('type', 'withdrawal');

        $total_deposit = $deposits->sum('amount');
        $total_withdrawal = $withdrawals->sum('amount');
        $total_net_amount = $total_deposit - $total_withdrawal;

        $coll = collect(IndividualResource::collection($this->individuals));

        $men = $coll->where('gender', 'Male');
        $women = $coll->where('gender', 'Female');

        $total_dep_men = $men->sum('totdep');
        $total_dep_women = $women->sum('totdep');

        $total_with_men = $men->sum('totwith');
        $total_with_women = $women->sum('totwith');

        return [  
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country, 
            'totdep' => $total_deposit,
            'totwith' =>  $total_withdrawal,
            'totnet' => $total_net_amount,
            'totdepmen' => $total_dep_men,
            'totdepwomen' => $total_dep_women,
            'totwithmen' => $total_with_men,
            'totwithwomen' => $total_with_women
        ];
    }
}
