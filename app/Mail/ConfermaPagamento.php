<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfermaPagamento extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $userName;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request,$userName)
    {
       $this->order=$request;
       $this->userName=$userName;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.conferma_pagamento');
    }
}
