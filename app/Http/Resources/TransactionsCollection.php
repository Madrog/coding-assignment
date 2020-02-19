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
            'data' => $this->collection,
            'meta' => [
                'total_number_of_transactions' => $this->collection->count(),
                'total_amount_of_deposits' => $this->collection->where('type', 'deposit')->sum('amount'),
                'total_amount_of_withdrawals' => $this->collection->where('type', 'withdrawal')->sum('amount'),
                'average_amount_per_deposit' => $this->collection->where('type', 'deposit')->avg('amount'),
                'average_amount_per_withdrawal' => $this->collection->where('type', 'withdrawal')->avg('amount'),
            ],
        ];;
    }
}
