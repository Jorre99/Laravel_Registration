@extends('layouts.template')

@section('main')
    <h4>Zwemmer toekennen</h4>
    <div class="row">
        <form class="col-8" action="/auth/assignswimmers/{{$customer_swimming_lesson->id}}" method="post">
            @method('put')
            @csrf

            <b style="">Details:</b>
            <p>
                Dag: {{ $customer_swimming_lesson->swimming_lesson->weekday }}<br>
                Start uur: {{ $customer_swimming_lesson->swimming_lesson->start_time }}<br>
                Eind uur: {{ $customer_swimming_lesson->swimming_lesson->end_time }}<br>
                Zwemleraar: {{ $customer_swimming_lesson->swimming_lesson->user->name }} {{ $customer_swimming_lesson->swimming_lesson->user->sur_name }}
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Voorkeur</th>
                    <th>GSM</th>
                    <th>Geboortedatum</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> {{ $customer_swimming_lesson->customer->first_name }} {{ $customer_swimming_lesson->customer->name }} </td>
                    <td> {{ $customer_swimming_lesson->swimming_lesson->weekday }}</td>
                    <td> {{ $customer_swimming_lesson->customer->telephone_nr }}</td>
                    <td> {{ $customer_swimming_lesson->customer->birth_date }}</td>
                    <td>
                        <button type="submit">toevoegen</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <div class="col-4">
            <b>Huidige zwemles</b>
            <table class="table">
                <thead>
                <tr>
                    <th>Zwemmers</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $customer_swimming_lessons as $customerswimming_lesson)
                    @if( $customerswimming_lesson->status_customer_swimming_lesson == "actief" and $customerswimming_lesson->swimming_lesson_id == $customer_swimming_lesson->swimming_lesson_id )
                        <tr>
                            <td>{{ $customerswimming_lesson->customer->first_name }} {{ $customerswimming_lesson->customer->name}}</td>
                            <td>
                                <form action="/auth/completeswimmers/{{$customerswimming_lesson->id}}"
                                      method="post">
                                    @method('put')
                                    @csrf
                                    <button type="submit">Voltooien</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
