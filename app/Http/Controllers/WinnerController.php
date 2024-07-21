<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Winner;
use App\Models\Note;
use App\Models\Scholar;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Inertia\Inertia;

class WinnerController extends Controller {
    
    public function index($activeYear){
        // $winner = Winner::where('id', $scholarship)->with('scholarships')->get();
        $winners = Winner::get();
        $year = $winners->where('activeYear', $activeYear);

        // $notes = Note::where('id', $winner->scholar_id)->get();
        return Inertia::render('Winner/index', [
            'winners' => $winners,
            'year' => $year,
        ]);
        
    }

    public function createWinner(Request $request){
        $award = $request->all(); //dd($award);
        $a = session('scholarshipid');
        $scholar = Scholar::where('application_id', $award[0]['scholar_id'])->get(); 
        $application = Application::where('id', $scholar[0]['application_id'])->get();
        $scholarshipName = Scholarship::find($a);
        $date = new Carbon();
        Winner::create([
            'scholarship_id' => $a,
            'scholar_id' => $scholar[0]['id'],
            'studentName' => $application[0]['name'],
            'contactNumber' => $application[0]['phone'],
            'studentEmail' => $application[0]['email'],
            'award_payments' => $award[0]['award_payments'],
            'frequnecy' => $award[1]['0'],
            'distributionDate' => $award[0]['distributionDate'],
            'scholarshipName' => $scholarshipName->name,
            'activeYear' => $date->format('Y'),
        ]);
        return to_route('scholarship.show', $a);
    }

    public function updateWinner(Request $request, Winner $winner){
        $a = $request->all();
        $b = $winner;
        
        $change = Winner::find($b->id);
        if (Arr::exists($b, 'award_payments') ) { $change->award_payments = $a[0]['award_payments']; }
        if (Arr::exists($b, 'award_payments') ) { $change->distributionDate = $a[0]['distributionDate']; }
        $change->save();
        return to_route('scholarship.show', $b->scholarship_id);
    }

    public function destroy($id){
        $a = $id;
        Winner::destroy($a);
        $scholarshipid = session('scholarshipid');
        return to_route('scholarship.show', $scholarshipid);
    }
}
