<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBooking extends Mailable
{
    use Queueable, SerializesModels;

    
 
    public $booking;
   
   public function __construct($booking)
   {
    $this->booking = $booking;
 }
   public function build()
   {
       return $this->view('mails.sendbooking');
   }
}
