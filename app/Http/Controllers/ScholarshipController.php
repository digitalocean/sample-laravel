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
use App\Models\Winner;
use Carbon\Carbon;
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
        $allScholaships = Scholarship::get();
        $totalApplications = DB::table('scholarship_applications')->get()->count();

        return Inertia::render('Scholarships/index', [
            'allScholaships' => new ScholarshipCollection($allScholaships),
            'totalApplications' => $totalApplications,
            // dd(new ScholarshipCollection($allScholaships)),
        ])->with('success', 'You are viewing all scholarships currently available');
    }

    public function scholarshipRefresh(){
        $s = Scholarship::all(); 
        // $update = Scholarship::find($s->id)->applications()->count(); //dd($update);
        // $count = $update->count();
        // $update->total = $count;
        // $update->save();
        foreach($s as $sch) {
            $scholarship = $sch;
            $u= Scholarship::find($sch->id)->applications()->count();
            //$a = DB::table('scholarships')->where('id', $id->id)->update(['total' => $u]);
            $scholarship->total = $u;
            $scholarship->save();
        }
        
        return redirect('scholarship');
    }



    //Show individual scholarship information 
    public function show($id) {
        $a = $id;
        //retrieve scholarship information
        $scholarshipInfo = Scholarship::where('id', $a)->get();
        // Get selected by scholarship id for page
        $selected = Scholarship::find($a)->applications()->orderBy('name')->get();
        /// Update count of scholarships
        $count = $scholarshipInfo->count();
        $update = Scholarship::find($a);
        $update->total = $count;
        $update->save();
        /// Update count of scholarships
        $otherscholarships = Scholarship::where('id', $scholarshipInfo[0]->partner_id)->get();
        $criteria = Selectioncriteria::has('scholarships')->get();
        $requirements = Requirementcriteria::has('scholarships')->get();
        $scholarshipuses = Scholarshipuse::has('scholarships')->get();
        $winners = Winner::where('scholarship_id', $a)->get();

        session([ 'partner_id' => $scholarshipInfo[0]->partner_id]);
        session([ 'scholarshipid' => $scholarshipInfo[0]->id]); 
        return Inertia::render('Scholarships/show', [
            'scholarship' => $scholarshipInfo,
            'applications' => $selected,
            'otherscholarship' => $otherscholarships,
            'requirements' => $requirements,
            'scholarshipuses' => $scholarshipuses,
            'criteria' => $criteria,
            'winners' => $winners,
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
        $date = new Carbon();
        $b = Scholarship::create([
            'partner_id' => $partner_id,
            'name' => $a[0]['name'],
            'deadline' => $a[0]['deadline'],
            'description' => $a[0]['description'],
            'award_payments' => $a[0]['award_payments'],
            'additional_information' => $a[0]['additional_information'],
            'review_applicants' => 'NO',
            'fund_amount' => $a[0]['fund_amount'],
            'activeYear' => $date->format('Y'),
        ]);
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
        // update yearly totals
        $date = new Carbon(); 
        $currentScholarshipTotal = Scholarship::where('activeYear', $date->format('Y') )->sum('fund_amount');
        DB::table('yearlytotal')->where('year', $date->format('Y'))->updateOrInsert([
            'year' => $date->format('Y'),
            'total' => $currentScholarshipTotal
        ]);

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
        $date = new Carbon();
        // check if data change
        $scholarshipid = session('scholarshipid');
        $scholarshipInfo = Scholarship::find($scholarshipid);
        if (Arr::exists($b, 'name') ) { $scholarshipInfo->name = $a[0]['name']; }
        if (Arr::exists($b, 'description')) {  $scholarshipInfo->description = $a[0]['description']; }        
        if (Arr::exists($b, 'deadline')) {  $scholarshipInfo->deadline = $a[0]['deadline']; }
        if (Arr::exists($b, 'award_payments')) {  $scholarshipInfo->award_payments = $a[0]['award_payments']; }
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

        if($scholarshipInfo->activeYear != $date->format('Y')) {
            DB::table('scholarships')->updateOrInsert([
                ['activeYear' => $date->format('Y')],
            ]);
        }

        $scholarshipInfo->save();
        $partner_id = session('partner_id'); 
        $currentScholarshipTotal = Scholarship::where('activeYear', $date->format('Y') )->sum('fund_amount');
        DB::table('yearlytotal')->where('year', $date->format('Y'))->updateOrInsert([
            'year' => $date->format('Y'),
            'total' => $currentScholarshipTotal
        ]);
        return to_route('partner.show', $partner_id);
    }

    public function scholarshipWinners(){

    }

    public function destroy($id){
        $a = $id; 
        Scholarship::destroy($a);
        $partner_id = session('partner_id');
        return to_route('partner.show', $partner_id);
    }

}
