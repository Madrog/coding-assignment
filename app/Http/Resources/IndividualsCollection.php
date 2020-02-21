<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndividualsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'males_count' => $this->collection->where('gender', 'Male')->count(),
            'females_count' => $this->collection->where('gender', 'Female')->count(),
            'ind_count' => $this->collection->count()
        ];
    }
}
