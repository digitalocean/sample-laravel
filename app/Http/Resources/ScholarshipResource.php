<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'additional_information' => $this->additional_information,
            'selection_criteria' => $this->selection_criteria, 
            'review_applicants' => $this->review_applicants,
            'award_payments' => $this->award_payments,
            'award_based_on' => $this->award_based_on,
            'renewability' => $this->renewability,
            'uses' => $this->uses,
            'deadline' => $this->deadline,
            'fund_amount' => $this->fund_amount,
        ];
    }
}
