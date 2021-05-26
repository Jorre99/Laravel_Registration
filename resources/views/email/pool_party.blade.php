@component('mail::message')

    Beste, {{$customer->name}}

    Het zwemfeestje dat u reserveerde op {{$pool_party->date}} is goedgekeurd.


Bedankt,
{{ config('app.name') }}
@endcomponent
