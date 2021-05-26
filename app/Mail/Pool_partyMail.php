<?php

namespace App\Mail;

use App\Customer;
use App\Pool_party;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pool_partyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pool_party;

    public $customer;

    /**
     * Create a new message instance.
     *
     * @param Pool_party $pool_party
     * @param $customer
     */
    public function __construct(Pool_party $pool_party, Customer $customer)
    {
        $this->pool_party=$pool_party;
        $this->customer=$customer;
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
            ->subject('Zwembadregistratie - zwemfeestjes')
            ->markdown('email.pool_party');
    }
}
