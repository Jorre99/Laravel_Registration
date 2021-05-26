<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@zwembadregistratie.be', 'Zwembadregistratie info')
            ->cc('info@zwembadregistratie.be', 'Zwembadregistratie info')
            ->subject('Zwembadregistratie - contact formulier')
            ->markdown('email.contact');
    }
}
