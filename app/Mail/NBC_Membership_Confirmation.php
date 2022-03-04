<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NBC_Membership_Confirmation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
   
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function build()
    {
        return $this->view('mails.activationmember');
    }
}
