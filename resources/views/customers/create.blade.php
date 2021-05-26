@extends('layouts.template')

@section('title', 'Customer aanmaken')

@section('main')
    <h4>Zwemles aanvragen</h4>

    <div>
        <h5>Vul volgende gegevens in</h5>
        <form action="/customers" method="post">
            @method('post')
            @csrf
            <div class="form-group">

                <label for="first_name">Voornaam</label>
                <input type="text" name="first_name" id="first_name"
                       class="form-control @error('first_name') is-invalid @enderror"
                       placeholder="Voornaam">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="name" style="padding-top: 20px;">Achternaam</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Achternaam"
                       minlength="3"
                       required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="email" style="padding-top: 20px;">E-mailadress</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="email"
                       minlength="3"
                       required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="telephone_nr" style="padding-top: 20px;">Telefoon</label>
                <input type="text" name="telephone_nr" id="telephone_nr"
                       class="form-control @error('telephone_nr') is-invalid @enderror"
                       placeholder="Telefoon nummer"
                       minlength="3"
                       required>
                @error('telephone_nr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="street">Straat</label>
                <input type="text" name="street" id="street"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="straat">
                @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="house_nr">huisnummer</label>
                <input type="text" name="house_nr" id="house_nr"
                       class="form-control @error('house_nr') is-invalid @enderror"
                       placeholder="huisnummer">
                @error('house_nr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="box_nr">Bus</label>
                <input type="box_nr" name="box_nr" id="box_nr"
                       class="form-control @error('box_nr') is-invalid @enderror"
                       placeholder="Bus">

                <label for="postal_code">Postcode</label>
                <input type="text" name="postal_code" id="postal_code"
                       class="form-control @error('postal_code') is-invalid @enderror"
                       placeholder="Postcode">
                @error('postal_code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="city">Stad</label>
                <input type="text" name="city" id="city"
                       class="form-control @error('city') is-invalid @enderror"
                       placeholder="Stad">
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="birth_date">Geboortedatum</label>
                <input type="text" name="birth_date" id="birth_date"
                       class="form-control @error('birth_date') is-invalid @enderror"
                       placeholder="1999-05-03">
                @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="note">Opmerking</label>
                <input type="text" name="note" id="note"
                       class="form-control @error('note') is-invalid @enderror"
                       placeholder="Opmerking">

            </div>
            <button type="submit" class="btn btn-success">Verzenden</button>
        </form>
    </div>
@endsection
