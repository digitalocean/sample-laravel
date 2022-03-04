<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Account_Registeration extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
   
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function build()
    {
        //accountregisteration
        return $this->view('mails.accountregisteration');
    }
}
