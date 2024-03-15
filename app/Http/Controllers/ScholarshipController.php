<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationCollection;
use App\Http\Resources\ScholarshipCollection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Models\Scholarship;
use App\Models\Application;
use App\Models\Selectioncriteria;
use App\Models\Requirementcriteria;
use App\Models\Scholarshipuse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class ScholarshipController extends Controller {
    // Full list of scholships genereated by URl and Outside sources
    // URL administration only
   
    public function index(){
        $allScholaships = Scholarship::all();
        return Inertia::render('Scholarships/index', [
            'allScholaships' => new ScholarshipCollection($allScholaships),
            // dd(new ScholarshipCollection($allScholaships)),
        ])->with('success', 'You are viewing all scholarships currently available');
    }

    //Show individual scholarship information 
    public function show($id) {
        $a = $id;
        //retrieve scholarship information
        $scholarshipInfo = Scholarship::where('id', $a)->get(); //dd($scholarshipInfo);
        // Get selected by scholarship id for page
        $selected = Application::has('scholarships')->get(); 
        $otherscholarships = Scholarship::where('id', $scholarshipInfo[0]->partner_id)->get();
        $criteria = Selectioncriteria::has('scholarships')->get();
        $requirements = Requirementcriteria::has('scholarships')->get();
        $scholarshipuses = Scholarshipuse::has('scholarships')->get();

        session([ 'partner_id' => $scholarshipInfo[0]->partner_id]);
        session([ 'scholarshipid' => $scholarshipInfo[0]->id]); 
        return Inertia::render('Scholarships/show', [
            'scholarship' => $scholarshipInfo,
            'applications' => $selected,
            'otherscholarship' => $otherscholarships,
            'requirements' => $requirements,
            'scholarshipuses' => $scholarshipuses,
            'criteria' => $criteria,
        ]);
    }

    /**
     * Create new scholarship.
     *
     * Creates new scholarshi9 or returns 200.
     * 
     */

    #[OpenApi\Operation(tags: ['scholarship'], method: 'PATCH')]
    public function store(Request $request): RedirectResponse {
        $a = $request->all();  //dd($a[2]);
        $partner_id = session('partner_id');
    
        $b = Scholarship::create([
            'partner_id' => $partner_id,
            'name' => $a[0]['name'],
            'deadline' => $a[0]['deadline'],
            'description' => $a[0]['description'],
            'award_payments' => $a[0]['award_payments'],
            'additional_information' => $a[0]['additional_information'],
            'review_applicants' => 'NO',
            'fund_amount' => $a[0]['fund_amount'],
        ]);
        // 'selection_criteria' => $a[1],
        // 'requirement_criteria' => $a[2],
        // 'award_based_on' => $a[3],
        // 'renewability' => $a[4],
        // 'uses' => $a[5],
        //dd(Selectioncriteria::find($a[1][0]["id"]));
        // $a = Selectioncriteria::find($a[1][0]["id"]); 
        $scholarshipInfo = Scholarship::find($b);
        if ($a[1] != null) { 
            foreach ( $a[1] as $a ){
                $c = Selectioncriteria::find($a["id"]);
                DB::table('selectioncriteria_scholarships')->insert([
                    ['selectioncriteria_id' => $c->id, 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            }   
        }

        $a = $request->all();
        if ($a[2] != null) { 
            foreach ( $a[2] as $a ){
                $c = Requirementcriteria::where('name', $a)->get();
                DB::table('requirement_scholarships')->insert([
                    ['requirement_id' => $c[0]['id'], 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            }   
        }

        $a = $request->all();
        if ($a[5] != null) { 
            foreach ( $a[5] as $a ){
                $c = Scholarshipuse::where('name', $a)->get();
                DB::table('scholarshipuse_scholarships')->insert([
                    ['scholarshipuse_id' => $c[0]['id'], 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            }   
        }

        return to_route('partner.show', $partner_id);
    }

    public function edit(){
        $scholarship_id = session('scholarshipid');
        $scholarshipInfo = Scholarship::where('id', $scholarship_id)->get();
        return Inertia::render('Scholarships/editScholarship', [
            'data' => $scholarshipInfo,
        ]);

    }


    public function update(Request $request) {
        $a = $request->all();  //dd($a);
        $b = $a[0];
        // check if data change
        $scholarshipid = session('scholarshipid');
        $scholarshipInfo = Scholarship::find($scholarshipid);
        if (Arr::exists($b, 'name') ) { $scholarshipInfo->name = $a[0]['name']; }
        if (Arr::exists($b, 'deadline')) {  $scholarshipInfo->deadline = $a[0]['deadline']; }
        if (Arr::exists($b, 'award_payments')) {  $scholarshipInfo->description = $a[0]['award_payments']; }
        if (Arr::exists($b, 'additional_information')) {  $scholarshipInfo->additional_information = $a[0]['additional_information']; }
        if (Arr::exists($b, 'fund_amount')) {  $scholarshipInfo->fund_amount = $a[0]['fund_amount']; }

        if ($a[1] != null) { 
            foreach ( $a[1] as $a ){
                $c = Selectioncriteria::find($a["id"]);
                DB::table('selectioncriteria_scholarships')->updateOrInsert([
                    ['selectioncriteria_id' => $c->id, 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            }
         }

        if ($a[2] != null) { 
            foreach ( $a[2] as $a ){
                $c = Requirementcriteria::find($a["id"]);
                DB::table('requirement_scholarships')->updateOrInsert([
                    ['selectioncriteria_id' => $c->id, 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            } 
        }
   
        if ($a[5] != null) {
            foreach ( $a[5] as $a ){
                $c = Scholarshipuse::find($a["id"]);
                DB::table('scholarshipuses_scholarships')->updateOrInsert([
                    ['selectioncriteria_id' => $c->id, 'scholarship_id' => $scholarshipInfo[0]['id']],
                ]);
            }   
        }

        $scholarshipInfo->save();
        $partner_id = session('partner_id');
        return to_route('partner.show', $partner_id);
    }

    public function destroy($id){
        $a = $id; 
        Scholarship::destroy($a);
        $partner_id = session('partner_id');
        return to_route('partner.show', $partner_id);
    }

}
