<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Student;
use App\Subject;
use App\Score;

class StudentExam extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $student;
    public $subject;
    public $id;

    public function __construct(student $student)
    {
        $this->student = $student;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $scores = Score::join('subjects','subjects.id','=','scores.subject_id')
        ->join('users','users.id','scores.student_id')
        ->select('subjects.id as sub_id',
                    'subjects.subject',
                    'scores.score'
        )->where('users.id', $this->student->id)
        ->get();
        return $this->from('nbc@gmail.com')
                    ->subject('Examination')
                    ->view('email.exam')
                    ->with(['student'=>$this->student,'exams' => $scores])
                    ;
    }
}
