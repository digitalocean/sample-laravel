<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationCollection;
use App\Http\Resources\ScholarCollection;
use App\Http\Resources\ScholarResource;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Requirementcriteria;
use App\Models\Scholar;
use App\Models\Scholarship;
use App\Models\Scholarshipuse;
use App\Models\Selectioncriteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ScholarController extends Controller {

    public function index() {

        $user = Auth::user(); 

        $a = DB::table('scholars')->where('user_id', $user['id'])
            ->join('applications', 'scholars.application_id', 'applications.id')
            ->select('scholars.email', 'scholars.parent_name2', 'scholars.parent_email2', 'applications.*' )->get();
     
        $b = $a[0]->id; 
  
        $scholarship = DB::table('scholarship_applications')
            ->where('application_id', $b)
            ->join('scholarships','scholarship_applications.scholarship_id', 'scholarships.id')->get(); //dd($scholarship);
        
       
        return Inertia::render('Scholars/Dashboard',[
            'scholar' => $a,
            'scholarships' => $scholarship,
        ]);
        
        
        
    }

    public function scholarsApplication() {
        $user = Auth::user();
        $preScholar = Scholar::where('user_id', $user->id)->get();
        $application = Application::where('id', $preScholar[0]['application_id'])->get();

        return Inertia::render('Applications/createApplication', [
            'application' => $application,
        ]);
    }

    public function storeScholarship(Request $request) {
        $user = Auth::user();
        $a = $request->all(); 
        // Get Scholars data buy user_id
        $scholar = Scholar::where('user_id', $user->id)->get();

        // create or update application froms scholars id
        DB::table('applications')
              ->where('id', $scholar[0]['application_id'])
              ->updateOrInsert([ 'name' => $request->name ],
                    [
                    'submitted_on' => $request->submitted_on,
                    'city' =>   $request->city,
                    'streetAddress' => $request->streetAddress, 
                    'state' => $request->state,
                    'zip' => $request->zipCode,        
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'parent_name' => $request->parent_name,
                    'application_essay' => $request->application_essay,
                    'community_service' => $request->community_service,
                    'submitted_on' => Carbon::now(),
                    'school' => $request->school,
                    'graduation_year' => $request->graduation_year,
                    'gpa' => $request->gpa,
                    'sat_Scheduled' => $request->sat_Scheduled,
                    'sat_score' => $request->sat_score,
                    'act_scheduled' => $request->act_scheduled,
                    'ap_test_name' => $request->ap_test_name,
                    'ap_test_score' => $request->ap_test_score,
                    'ap_test_name2' => $request->ap_test_name2,
                    'ap_test_score2' => $request->ap_test_score2,
                    'college_major' => $request->college_major,
                    'college_interest' => $request->college_interest,
                    'college_major2' => $request->college_major2,
                    'college_interest2' => $request->college_interest2,
                    'family_income' => $request->family_income,
                    'siblings' => $request->siblings,
                    'siblings_attending_college' => $request->siblings_attending_college,
                    'fasfa_acknowledgement' => $request->fasfa_acknowledgement,
                    'college_choice' => $request->college_choice,
                    'college_status' => $request->college_status,
                    'college_choice2' => $request->college_choice2,
                    'college_status2' => $request->college_status2,
                    'reference' => $request->reference,
                    'reference_email' => $request->reference_email,
                    'reference_relationship' => $request->reference_relationship,
                    'reference2' => $request->reference2,
                    'reference_email2' => $request->reference_email2,
                    'reference_relationship2' => $request->reference_relationship2,
              ]);
           
            return to_route('scholar.list');
    }

    public function updateApplication() {
        $user = Auth::user();
        $preScholar = Scholar::where('user_id', $user->id)->get();
        $application = Application::where('id', $preScholar[0]['application_id'])->get(); //dd($application[0]->name);

        return Inertia::render('Applications/updateApplication', [
            'application' => $application,
        ]);
    }

    public function updateStore(Request $request){
        $user = Auth::user();
        $a = $request->all(); //dd($a);
        $scholar = Scholar::where('user_id', $user->id)->get(); //dd($scholar[0]['application_id']);
        $app = Application::find($scholar[0]['application_id']);
        if( $a[0]['name'] != Null  ){ $app->name = $a[0]['name']; }
        if( $a[0]['email'] != Null  ){ $app->email = $a[0]['email']; }
        if( $a[0]['streetAddress'] != Null  ){ $app->streetAddress = $a[0]['streetAddress']; }
        if( $a[0]['city'] != Null  ){ $app->city = $a[0]['city']; }
        if( $a[0]['state'] != Null  ){ $app->state = $a[0]['state']; }
        if( $a[0]['zip'] != Null  ){ $app->zip = $a[0]['zip']; }
        if( $a[0]['act_scheduled'] != Null  ){ $app->act_scheduled = $a[0]['act_scheduled']; }
        if( $a[0]['act_score'] != Null  ){ $app->act_score = $a[0]['act_score']; }
        if( $a[0]['sat_scheduled'] != Null  ){ $app->sat_scheduled = $a[0]['sat_scheduled']; }
        if( $a[0]['sat_score'] != Null  ){ $app->sat_score = $a[0]['sat_score']; }
        if( $a[0]['siblings'] != Null  ){ $app->siblings = $a[0]['siblings']; }
        if( $a[0]['siblings_attending_college'] != Null  ){ $app->siblings_attending_college = $a[0]['siblings_attending_college']; }
        if( $a[0]['college_choice'] != Null  ){ $app->college_choice = $a[0]['college_choice']; }
        if( $a[0]['college_major'] != Null  ){ $app->college_major = $a[0]['college_major']; }
        if( $a[0]['college_status'] != Null  ){ $app->college_status = $a[0]['college_status']; }
        if( $a[0]['college_choice2'] != Null  ){ $app->college_choice2 = $a[0]['college_choice2']; }
        if( $a[0]['college_major2'] != Null  ){ $app->college_major2 = $a[0]['college_major2']; }
        if( $a[0]['college_status2'] != Null  ){ $app->college_status2 = $a[0]['college_status2']; }
        if( $a[0]['college_choice3'] != Null  ){ $app->college_choice3 = $a[0]['college_choice3']; }
        if( $a[0]['college_major3'] != Null  ){ $app->college_major3 = $a[0]['college_major3']; }
        if( $a[0]['college_status3'] != Null  ){ $app->college_status3 = $a[0]['college_status3']; }
        if( $a[0]['reference'] != Null  ){ $app->reference = $a[0]['reference']; }
        if( $a[0]['reference_email'] != Null  ){ $app->reference_email = $a[0]['reference_email']; }
        if( $a[0]['reference_relationship'] != Null  ){ $app->reference_relationship = $a[0]['reference_relationship']; }
        // if( $a[0]['reference2'] != Null  ){ $app->reference2 = $a[0]['reference2']; }
        // if( $a[0]['reference_email2'] != Null  ){ $app->reference_email2 = $a[0]['reference_email2']; }
        // if( $a[0]['reference_relationship2'] != Null  ){ $app->reference_relationship2 = $a[0]['reference_relationship2']; }
        if( $a[0]['application_essay'] != Null  ){ $app->application_essay = $a[0]['application_essay']; }
        if( $a[0]['community_service'] != Null  ){ $app->community_service = $a[0]['community_service']; }

        $app->save();

        dd('We saved check db');

    }


    public function scholarshipList() {
        $scholarship = Scholarship::get();
        $scholarshipSingle = Scholarship::where('id', '1')->get();
        $criteria = Selectioncriteria::where('id', '1')->get(); 
        $requirements = Requirementcriteria::where('id', '1')->get(); 
        $scholarshipuses = Scholarshipuse::where('id', '1')->get();
        
        $message = session('message');
        return Inertia::render('Scholars/Scholarshiplist', [
            'scholarship' => $scholarship,
            'scholarshipInfo' => $scholarshipSingle,
            'requirements' => $requirements,
            'scholarshipuses' => $scholarshipuses,
            'criteria' => $criteria,
            'message' => $message
        ]);

    }

    public function scholarshipView(Scholarship $scholarship){
        session()->forget('message');
        $scholarshipAll = Scholarship::get();
        $scholarshipSingle = Scholarship::where('id', $scholarship->id)->get(); //dd($scholarshipSingle);
        $criteria = Selectioncriteria::where('id', $scholarship->id)->get(); 
        $requirements = Requirementcriteria::where('id', $scholarship->id)->get(); 
        $scholarshipuses = Scholarshipuse::where('id', $scholarship->id)->get();

        return Inertia::render('Scholars/Scholarshiplist', [
            'scholarship' => $scholarshipAll,
            'scholarshipInfo' => $scholarshipSingle,
            'requirements' => $requirements,
            'scholarshipuses' => $scholarshipuses,
            'criteria' => $criteria,
            'message' => 'false'
        ]);
    }

    public function applyScholarship(Scholarship $scholarship){

        $user = Auth::user();
        $scholar = Scholar::where('user_id', $user->id)->get();

        DB::table('scholarship_applications')
            ->updateOrInsert([
                'scholarship_id' => $scholarship['id'],
                'application_id' => $scholar[0]['application_id'],
              ]);
        session(['message' => 'true']);
        return to_route('scholar.list');
    }
}
