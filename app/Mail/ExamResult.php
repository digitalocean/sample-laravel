<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExamResult extends Mailable
{
    use Queueable, SerializesModels;

     public $lastresult;
   
    public function __construct($lastresult)
    {
        $this->lastresult = $lastresult;
    }
    public function build()
    {
        return $this->view('pass.showlastresult2');
    }
}