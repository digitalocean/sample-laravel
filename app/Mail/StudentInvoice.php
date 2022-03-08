<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Student;
use App\Subject;
use App\Invoice;

class StudentInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $student;
    public $invoice;
    public $subject;
    public $total=0;
    public function __construct(Student $student)
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
        $invoices=Invoice::join('subjects','subjects.id','=','invoices.subject_id')
        ->join('students','students.id','=','invoices.student_id')
        ->select('subjects.id as sub_id',
                    'subjects.subject',
                    'invoices.invoice'
                     )
                    ->where('student_id',$this->student->id)
                    ->get();
        return $this->from('info@acpa-global.net')
        ->subject('Invoice')
        ->view('email.sendInv')
        ->with(['student'=>$this->student,'invoices' => $invoices])

        ;
    }
}
