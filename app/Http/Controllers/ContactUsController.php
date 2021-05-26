<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{
    // Show the contact form
    public function show()
    {
        return view('contact');
    }

    // Send email
    public function sendEmail(Request $request)
    {

        // Restricties toevoegen aan de invulvelden
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:10',
            'contact' => 'required'
        ]);

        // Mail versturen.
        $email = new ContactMail($request);
        Mail::to($request) // or Mail::to($request->email, $request->name)
        ->send($email);

        // Flash filled-in form values to the session
        $request->flash();

        // Succes melding (groene melding op de contact pagina)
        session()->flash('success', 'Dank u voor uw bericht.<br>We nemen zo snel mogelijk contact met u op.');

        // Redirect to the contact-us link ( NOT to view('contact')!!! )
        return redirect('contact-us');
    }
}
