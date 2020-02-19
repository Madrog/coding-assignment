<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SaccosCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $deposits = $collections->where('type', 'deposit');
        $withdrawals = $collections->where('type', 'withdrawal');

        $total_deposit = $deposits->sum('amount');
        $total_withdrawal = $withdrawals->sum('amount');
        $total_net_amount = $total_deposit - $total_withdrawal;

        return [
            'tot_num_of_trans' => $this->collection->count(),
            'tot_dep' => $total_deposit,
            'tot_with' => $total_withdrawal,
            'tot_net_amt' => $total_net_amount,
            'avg_amt_per_dep' => $this->collection->where('type', 'deposit')->avg('amount'),
            'avg_amt_per_with' => $this->collection->where('type', 'withdrawal')->avg('amount')
        ];
    }
}
