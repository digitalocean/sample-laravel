<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model {
    use HasFactory;

    protected $table = 'applications';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'scholarship_id',
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
        'reference',
        'reference_email1',
        'reference_relationshiip',
        'reference2',
        'reference_email2',
        'reference_relationshiip2',
        'resume_upload',
        'essay_upload',
        'additional_information_upload',
        
    ]; 

    public function scholarships(): BelongsToMany {
        return $this->belongsToMany(Scholarship::class, 'scholarship_applications');
    }

}
