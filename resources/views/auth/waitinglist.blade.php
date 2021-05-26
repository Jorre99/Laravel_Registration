@extends('layouts.template')

@section('main')
    <h1>Wachtlijst</h1>
    <div class="row">

        <form method="get" action="/auth/waitinglists" id="searchForm">
            <div class="row">
                <div class="col-sm-7 mb-2">
                    <label for="customer">Zoek op naam</label>
                    <input type="text" class="form-control" name="customer" id="customer"
                           value="{{ request()->customer }}" placeholder="Zoeken op naam of email">
                </div>
                <div class="col-sm-5 mb-2">
                    <label for="order">Sorteren op</label>
                    <select class="form-control" name="order" id="order">
                        <option value="%">ID (1 => ...)</option>
                        <option value="nameA" {{ (request()->order ==  'nameA' ? 'selected' : '') }}>Name (A => Z)
                        </option>
                        <option value="nameZ" {{ (request()->order ==  'nameZ' ? 'selected' : '') }}>Name (Z => A)
                        </option>
                    </select>
                </div>
            </div>
        </form>
        @if ($customers->count() == 0 )
            <div class="alert alert-danger alert-dismissible fade show">
                Kan geen klanten vinden <b>'{{ request()->customer }}'</b> met de volgende naam.
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @else
            @include('shared.alert')

            <table class="col-12" style="width: 100%">
                <tr>
                    <th>Naam</th>
                    <th>Voorkeur</th>
                    <th>GSM</th>
                    <th>Geboorte datum</th>
                    <th>Status</th>
                </tr>
                @foreach($customers as $cust)
                    @foreach($cust->customer_swimming_lessons as $cust_swim_lesson)
                        @if($cust_swim_lesson->status_customer_swimming_lesson == "wachtend" or $cust_swim_lesson->status_customer_swimming_lesson == "actief")
                            @foreach($swimming_lessons as $swimles)
                                @if($swimles->id == $cust_swim_lesson->swimming_lesson_id)
                                    <tr>
                                        <td>{{ $cust->first_name}} {{ $cust->name }}</td>
                                        <td>{{$swimles->weekday }}</td>
                                        <td>{{ $cust->telephone_nr }}</td>
                                        <td>{{ $cust->birth_date }}</td>
                                        <td>{{ $cust_swim_lesson->status_customer_swimming_lesson }}</td>
                                        <td>
                                            @if($cust_swim_lesson->status_customer_swimming_lesson == "wachtend")
                                                <form action="/auth/waitinglists/{{ $cust_swim_lesson->id }}"
                                                      method="post">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="status_customer_swimming_lesson"
                                                           id="status_customer_swimming_lesson"
                                                           value="wachtend">
                                                    <button type="submit">Verwijderen</button>
                                                </form>
                                            @elseif($cust_swim_lesson->status_customer_swimming_lesson == "actief")
                                                <form action="/auth/waitinglists/{{ $cust_swim_lesson->id }}"
                                                      method="post">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="status_customer_swimming_lesson"
                                                           id="status_customer_swimming_lesson"
                                                           value="actief">
                                                    <button type="submit">Voltooien</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </table>
    </div>
    @endif
@endsection
