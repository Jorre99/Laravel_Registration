<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use LaravelDaily\Invoices\Invoice;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    /**
     * @var string
     */
    private $invoiceFullpath;

    /**
     * Create a new message instance.
     *
     * @param $link
     */
    public function __construct(Invoice $invoice)
    {

        $this->invoiceFullpath = storage_path(
            'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $invoice->filename);
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
            ->subject('Zwembadregistratie - Factuur')
//            ->attachFromStorage($this->link, 'name.pdf', [
//                'mime' => 'application/pfd'
//            ])
                ->attach($this->invoiceFullpath)
            ->markdown('email.receipt');
    }
}
