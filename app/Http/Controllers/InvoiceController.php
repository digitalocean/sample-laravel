<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Student;
use App\Mail\StudentInvoice;


class InvoiceController extends Controller
{

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

    public function sendInv(){
        $student = Student::find(1);
         //Mail::to($::to($student->e //Mail::to($)->send(new StudentInvoice($student));
         //Mail::to($::to('seralkhatem123@g //Mail::to($.com')->send(new NBC_Membership_Confirmation($student));
             //Mail::to($::to('info@acpaglobal.net')->send(new NBC_Membership_Confirmation($student));
        echo 'send Invoice Successfully';

    }

   /* public function myaccount()
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
        ->view('map.myaccount')
        ->with(['student'=>$this->student,'invoices' => $invoices])
        ;
        return view('map.myaccount');

    } */
    public function myaccount()
    {
        $student = Student::find(1);
        $invoices=Invoice::join('subjects','subjects.id','=','invoices.subject_id')
        ->join('students','students.id','=','invoices.student_id')
        ->select('subjects.id as sub_id', 'subjects.subject', 'invoices.invoice')
                    ->where('student_id',$this->student->id)
                    ->get();
        //Mail::to($student->email)->send(new StudentInvoice($student));
        //echo 'send Invoice Successfully';
        //return view('email.sendInv');
        return view('map.myaccount')->with(['student'=>$this->student,'invoices' => $invoices]);

    }
}
