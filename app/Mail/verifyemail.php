<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Client;
class verifyemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Client;

    public function __construct(Client $Client)
    {
        $this->Client = $Client;
    }
    
    
    
     
     
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Client.Emails.sendview');
    }
}
