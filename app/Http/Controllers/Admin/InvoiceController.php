<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\ReceiptMail;
use App\Price;
use App\Receipt;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Validation\Rules\In;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Mail;
use function Sodium\add;

class InvoiceController extends Controller
{
    public function show(Receipt $receipt)
    {
        $seller = new Party([
            'name' => $receipt->user->name . ' ' . $receipt->user->sur_name,
            'email' => $receipt->user->email,
            'phone' => $receipt->user->telephone,
        ]);


        $customer = new Buyer([
            'name' => $receipt->school->name,
            'address' => $receipt->school->street . ' ' . $receipt->school->house_nr . ' ' .
                $receipt->school->postal_code . ' ' . $receipt->school->city,
            'email' => $receipt->school->email,
            'phone' => $receipt->school->telephone,
        ]);

        $prices = Price::where('name', 'school_kind')->FirstOrFail();
        $items = [];

        foreach ($receipt->pool_appointments as $app){
            $item = (new InvoiceItem())->title($app->date . " Klas: " . $app->school_class->class_name)->pricePerUnit($prices->price)->quantity($app->pupil_count);
            array_push($items, $item);
        }

        $invoice = Invoice::make()
            ->filename($receipt->school->name . 'ReceiptNr' . $receipt->id)
            ->buyer($customer)
            ->seller($seller)
            ->addItems($items)
            ->sequence($receipt->id);

        return $invoice->stream();
    }

    public function send(Receipt $receipt)
    {
        $seller = new Party([
            'name' => $receipt->user->name . ' ' . $receipt->user->sur_name,
            'email' => $receipt->user->email,
            'phone' => $receipt->user->telephone,
        ]);


        $customer = new Buyer([
            'name' => $receipt->school->name,
            'address' => $receipt->school->street . ' ' . $receipt->school->house_nr . ' ' .
                $receipt->school->postal_code . ' ' . $receipt->school->city,
            'email' => $receipt->school->email,
            'phone' => $receipt->school->telephone,
        ]);

        $prices = Price::where('name', 'school_kind')->FirstOrFail();
        $items = [];

        foreach ($receipt->pool_appointments as $app){
            $item = (new InvoiceItem())->title($app->date . " Klas: " . $app->school_class->class_name)->pricePerUnit($prices->price)->quantity($app->pupil_count);
            array_push($items, $item);
        }

        $invoice = Invoice::make()
            ->filename($receipt->school->name . 'ReceiptNr' . $receipt->id)
            ->buyer($customer)
            ->seller($seller)
            ->addItems($items)
            ->sequence($receipt->id)
            ->save('public');

//         Mail versturen.
        $email = new ReceiptMail($invoice);
        Mail::to($receipt->school->email)
            ->send($email);


        session()->flash('success', 'De factuur is verstuurd naar: ' . $receipt->school->email);

        return redirect('admin/schools/');
    }

}
