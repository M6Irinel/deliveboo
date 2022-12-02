<?php

namespace App\Mail;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfermaRegistrazione extends Mailable
{
    use Queueable, SerializesModels;
    public $restaurant;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($restaurant)
    {
   
       $this->restaurant=$restaurant;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.conferma_registrazione');
    }
}
