<?php

namespace App\Http\Resources;

use App\Http\Resources\ApplicationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScholarResource extends JsonResource
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
            // 'application_id' => $this->application_id,
            // 'parent_name' => $this->parent_name,
            // 'parent_email' => $this->parent_email,
            // 'parente_name2' => $this->parent_name2,
            // 'parent_email2' => $this->parent_email2,
            // 'application' => ApplicationResource::collection($this->applicatiion),
            //'id' => $this->id,
            //'awarded' => $this->awarded,
            'name' => $this->name,
            'email' => $this->email,
            'submitted_on' => $this->submitted_on,
            'phone' => $this->phone,
            'parent_name' => $this->parent_name,
            'parent_job' => $this->parent_job,
            'parent_phone' => $this->parent_phone,
            'parent_email' => $this->parent_email,
            'application_essay' => $this->application_essay,
            'community_service' => $this->community_service,
            'school' => $this->school,
            'graduation_year' => $this->graduation_year,
            'gpa' => $this->gpa,
            'sat_scheduled' => $this->sat_scheduled,
            'sat_score' => $this->sat_score,
            'act_scheduled' => $this->act_scheduled,
            'act_score' => $this->act_score,
            'ap_test_name' => $this->ap_test_name,
            'ap_test_score' => $this->ap_test_score,
            'ap_test_name2' => $this->ap_test_name2,
            'family_income' => $this->family_income,
            'siblings' => $this->siblings,
            'siblings_attending_college' => $this->siblings_attending_college,
            'fasfa_acknowledgement' => $this->fasfa_acknowledgement,
            'college_choice' => $this->college_choice,
            'college_major' => $this->college_major,
            'college_status' => $this->college_status,
            'college_choice2' => $this->college_choice2,
            'college_major2' => $this->college_major2,
            'college_status2' => $this->college_status2,
            'reference' => $this->reference,
            'reference_email' => $this->reference_email,
            'reference_relationship' => $this->reference_relationship,
            'reference2' => $this->reference2,
            'reference_email2' => $this->reference_email2,
            'reference_relationship2' => $this->reference_relationship2,
            'resume_upload' => $this->resume_upload,
            'essay_upload' => $this->essay_upload,
            'additional_information_upload' => $this->additional_information_upload,
        ];
    }
}
