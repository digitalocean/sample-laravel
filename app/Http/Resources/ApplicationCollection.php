<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicationCollection extends ResourceCollection
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
            'awarded',
            'name',
            'email',
            'submitted_on',
            'phone',
            'parent_name',
            'parent_job',
            'parent_phone',
            'parent_email',
            'applicant_essay',
            'community_service',
            'school',
            'application_essay',
            'graduation_year',
            'gpa',
            'sat_Scheduled',
            'sat_Score',
            'act_scheduled',
            'act_score',
            'ap_test_name',
            'ap_test_score',
            'ap_test_name2',
            'family_income',
            'siblings',
            'siblings_attending_college',
            'fasfa_acknowledgement',
            'college_choice',
            'college_major',
            'college_status',
            'college_choice2',
            'college_major2',
            'college_status2',
            'scholarship_choice',
            'scholarship_choice2',
            'scholarship_choice3',
            'scholarship_choice4',
            'scholarship_choice5',
            'scholarship_choice6',
            'scholarship_choice7',
            'reference',
            'reference_email',
            'reference_relationshiip',
            'reference2',
            'reference_email2',
            'reference_relationshiip2',
            'resume_upload',
            'essay_upload',
            'additional_information_upload',
        );
    }
}
