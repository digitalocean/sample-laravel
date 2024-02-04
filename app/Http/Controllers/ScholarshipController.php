<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationCollection;
use App\Http\Resources\ScholarshipCollection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Models\Scholarship;
use App\Models\Partner;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
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
        $selected = Application::where('scholarship_id', $a)->get();
        $otherscholarships = Scholarship::where('id', $scholarshipInfo[0]->partner_id)->get();
        session([ 'partner_id' => $scholarshipInfo[0]->partner_id]);
        session([ 'scholarshipid' => $scholarshipInfo[0]->id]);  
        return Inertia::render('Scholarships/show', [
            'scholarship' => $scholarshipInfo,
            'applications' => $selected,
            'otherscholarship' => $otherscholarships
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
        $a = $request->all();
        $partner_id = session('partner_id');
        $number1 = implode($a[0]['fund_amount']);
        $number2 = implode($a[0]['award_payments']);

        $b = Scholarship::create([
            'partner_id' => $partner_id,
            'name' => $a[0]['name'],
            'deadline' => $a[0]['deadline'],
            'description' => $a[0]['description'],
            'award_payments' => $number2,
            'additional_information' => $a[0]['additional_information'],
            'review_applicants' => 'NO',
            'selection_criteria' => $a[1],
            'requirement_criteria' => $a[2],
            'award_based_on' => $a[3],
            'renewability' => $a[4],
            'uses' => $a[5],
            'fund_amount' => $number1,
        ]);
        return to_route('partner.show', $partner_id);
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

        if ($a[1] != null) { $scholarshipInfo->selection_criteria = $a[1]; }
        if ($a[2] != null) { $scholarshipInfo->requirement_criteria = $a[2]; }
        if ($a[3] != null) { $scholarshipInfo->award_based_on = $a[3]; }
        if ($a[4] != null) { $scholarshipInfo->renewability = $a[4]; }
        if ($a[5] != null) { $scholarshipInfo->uses = $a[5]; }

        $scholarshipInfo->save();
        $partner_id = session('partner_id');
        return to_route('partner.show', $partner_id);
    }

}
