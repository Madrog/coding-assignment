<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'tot_num_of_trans' => $this->collection->count(),
            'tot_amt_of_dep' => $this->collection->where('type', 'deposit')->sum('amount'),
            'tot_amt_of_with' => $this->collection->where('type', 'withdrawal')->sum('amount'),
            'avg_amt_per_dep' => $this->collection->where('type', 'deposit')->avg('amount'),
            'avg_amt_per_with' => $this->collection->where('type', 'withdrawal')->avg('amount')
        ];
    }
}
