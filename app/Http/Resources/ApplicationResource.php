<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            'awarded' => $this->awarded,
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
            'sat_Scheduled' => $this->sat_Scheduled,
            'sat_Score' => $this->sat_Score,
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
            'scholarship_choice' => $this->scholarship_choice,
            'scholarship_choice2' => $this->scholarship_choice2,
            'scholarship_choice3' => $this->scholarship_choice3,
            'scholarship_choice4' => $this->scholarship_choice4,
            'scholarship_choice5' => $this->scholarship_choice5,
            'scholarship_choice6' => $this->scholarship_choice6,
            'scholarship_choice7' => $this->scholarship_choice7,
            'reference' => $this->reference,
            'reference_email' => $this->reference_email1,
            'reference_relationship' => $this->reference_relationshiip,
            'reference2' => $this->reference2,
            'reference_email2' => $this->reference_email2,
            'reference_relationship2' => $this->reference_relationshiip2,
            'resume_upload' => $this->resume_upload,
            'essay_upload' => $this->essay_upload,
            'additional_information_upload' => $this->additional_information_upload,
        ];
    }
}
