<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Scholar;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function createNotes($id){
        // id is equal to application_id
        // get notes attached to scholer and application
        $userNotes = DB::table('scholars')
            ->where('scholars.application_id', $id)
            ->join('applications', 'applications.id', 'scholars.application_id')
            ->join('notes', 'notes.scholar_id', 'scholars.id')
            ->select('notes.*', 'scholars.user_id', 'applications.name')->get(); 
        $student = $userNotes[0]->name;  
        $studentID = $id; //dd($studentID);
        session(['ScholarId' => $userNotes[0]->scholar_id]);
        return Inertia::render('Notes/show', [
            'userNotes' => $userNotes,
            'student' => $student,
            'id' => $studentID,
        ]);
    }   

    public function storeNote(Request $request) {
        $n = $request->all(); //dd($n);
        $s = session('ScholarId');
        Note::create([
            'scholar_id' => $s,
            'title' => $n['title'],
            'body' => $n['body'],
            'noteType' => $n['noteType'],
        ]);

        $s = session('ScholarId');
        return to_route('create.notes', $s);

    }

    public function viewNotes($id) {
        $s = session('ScholarId');
        $userNotes = Note::where('id', $s)->get();
        return Inertia::render('Notes/show', [
            'userNotes' => $userNotes,
        ]);
    }
}
