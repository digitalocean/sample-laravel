<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Winner;
use App\Models\Note;
use App\Models\Scholar;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WinnerController extends Controller {
    
    public function index(Scholarship $scholarship){

        $winner = Winner::where('id', $scholarship)->with('scholarships')->get();

        dd($winner);

        $notes = Note::where('id', $winner->scholar_id)->get();
        
    }

    public function createWinner(Request $request){
        $award = $request->all(); 
        $scholar = Scholar::where('application_id', $award['applicationID'])->get();
        $application = Application::where('id', $award['applicationID'])->get();

        $winner = Winner::create([
            'scholarship_id' => $award['scholarshipID'],
            'scholar_id' => $scholar->id,
            'studentName' => $application->name,
            'contactNumber' => $application->phone,
            'studentEmail' => $application->email,
            'award_payments' => $award['award_payments'],
            'frequnecy' => $award['frequnecy'],
            'distributionDate' => $award['distributionDate'],
        ]);



    }
}
