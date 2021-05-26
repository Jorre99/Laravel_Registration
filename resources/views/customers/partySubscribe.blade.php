@extends('layouts.template')

@section('title', 'Customer aanmaken')

@section('main')
    <div>
        <h4>Vul volgende gegevens in voor het zwemfeest op {{ $pool_party->date}} te reserveren</h4>
        <form action="/customers" method="post">
            @method('post')
            @csrf
            <div class="form-group row">
                <input type="hidden" name="pool_party_id" value="{{$pool_party->id}}">
            <div class="col-6">
                <label for="first_name">Voornaam</label>
                <input type="text" name="first_name" id="first_name"
                       class="form-control @error('first_name') is-invalid @enderror"
                       placeholder="Voornaam">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                <div class="col-6">
                <label for="name">Achternaam</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Achternaam"
                       minlength="3"
                       required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="email">E-mailadress</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="email"
                       minlength="3"
                       required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="telephone_nr">Telefoon</label>
                <input type="text" name="telephone_nr" id="telephone_nr"
                       class="form-control @error('telephone_nr') is-invalid @enderror"
                       placeholder="Telefoon nummer"
                       minlength="3"
                       required>
                @error('telephone_nr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="street">Straat</label>
                <input type="text" name="street" id="street"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="straat">
                @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-3">
                <label for="house_nr">huisnummer</label>
                <input type="text" name="house_nr" id="house_nr"
                       class="form-control @error('house_nr') is-invalid @enderror"
                       placeholder="huisnummer">
                @error('house_nr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-3">
                <label for="box_nr">Bus</label>
                <input type="box_nr" name="box_nr" id="box_nr"
                       class="form-control @error('box_nr') is-invalid @enderror"
                       placeholder="Bus">
                </div>
                <div class="col-6">
                <label for="postal_code">Postcode</label>
                <input type="text" name="postal_code" id="postal_code"
                       class="form-control @error('postal_code') is-invalid @enderror"
                       placeholder="Postcode">
                @error('postal_code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="city">Stad</label>
                <input type="text" name="city" id="city"
                       class="form-control @error('city') is-invalid @enderror"
                       placeholder="Stad">
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="birth_date">Geboortedatum</label>
                <input type="date" name="birth_date" id="birth_date"
                       class="form-control @error('birth_date') is-invalid @enderror"
                       placeholder="1999-05-03">
                @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="pupil_count">Aantal kinderen</label>
                <input type="text" name="pupil_count" id="pupil_count"
                       class="form-control @error('pupil_count') is-invalid @enderror" placeholder="aantal kinderen">
                @error('pupil_count')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="meal_id">Maaltijd </label>
                <select name="meal_id" id="meal_id" class="form-control">
                    @foreach($meals as $meal)
                        @if($meal->status_meal == 1)
                            <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
                <div class="col-6">
                <label for="note">Opmerking</label>
                <input type="text" name="note" id="note"
                       class="form-control @error('note') is-invalid @enderror"
                       placeholder="Opmerking">
                </div>

            </div>
            <button type="submit" class="btn btn-success">Verzenden</button>
        </form>
    </div>


    </div>
@endsection
