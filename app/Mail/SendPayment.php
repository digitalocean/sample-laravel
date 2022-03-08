<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPayment extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;
    public $user;
   
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function build()
    {
        return $this->view('mails.sendpayment');
    }
}
