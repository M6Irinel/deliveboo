<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfermaOrdine extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
       $this->order=$request;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.conferma_ordine');
    }
}
