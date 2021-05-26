@component('mail::message')
    Beste {{ $request->name }},
    Bedankt voor uw berricht
    We nemen zo snel mogelijk contact met u op!



        Uw naam: {{ $request->name }}
        Uw email: {{ $request->email }}
        Onderwerp: {{$request->contact}}

Uw berricht: {!! nl2br($request->message) !!}

    Bedankt,
    {{ env('APP_NAME') }}Registratie team
@endcomponent
