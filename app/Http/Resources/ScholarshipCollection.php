<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScholarshipCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map->only(
            'id',
            'name', 
            'additional_information', 
            'selection_criteria',
            'review_applicants',
            'award_payments',
            'award_based_on',
            'renewability',
            'uses',
            'deadline',
            'fund_amount',
            'total'
        );
    }
}
