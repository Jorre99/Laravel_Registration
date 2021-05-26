@extends('layouts.template')

@section('title', 'zwemmers')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">De klant {{ $customer->name}} aanpassen.</h4>
        <form action="/auth/swimmers/{{$customer -> id}}" method="post">
            @method('put')
            @csrf
            <div class="form-group row">

                <div class="col-md-6"> <label for="name">Naam</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Name"
                           value="{{ old('name', $customer->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-6"> <label for="first_name">Voornaam</label>
                    <input type="text" name="first_name" id="first_name"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Voornaam"
                           minlength="3"
                           required
                           value="{{ old('first_name', $customer->first_name )}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-6"> <label for="email" style="padding-top: 20px;">E-mailadres</label>
                    <input type="text" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="email"
                           minlength="3"
                           required
                           value="{{ old('email', $customer->email )}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-6"> <label for="telephone_nr" style="padding-top: 20px;">Telefoonnummer</label>
                    <input type="text" name="telephone_nr" id="telephone_nr"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="telephone_nr"
                           minlength="3"
                           required
                           value="{{ old('telephone_nr', $customer->telephone_nr )}}">
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-3"> <label for="city" style="padding-top: 20px;">Stad</label>
                    <input type="text" name="city" id="city"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="city"
                           minlength="4"
                           required
                           value="{{ old('city', $customer->city )}}">
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-3"> <label for="postal_code" style="padding-top: 20px;">Postcode</label>
                    <input type="text" name="postal_code" id="postal_code"
                           class="form-control @error('postal_code') is-invalid @enderror"
                           placeholder="postal_code"
                           minlength="4"
                           required
                           value="{{ old('postal_code', $customer->postal_code )}}">
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-3"> <label for="street" style="padding-top: 20px;">Straat</label>
                    <input type="text" name="street" id="street"
                           class="form-control @error('street') is-invalid @enderror"
                           placeholder="street"
                           minlength="3"
                           required
                           value="{{ old('street', $customer->street )}}">
                    @error('street')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-2"> <label for="house_nr" style="padding-top: 20px;">Huisnummer</label>
                    <input type="text" name="house_nr" id="house_nr"
                           class="form-control @error('street') is-invalid @enderror"
                           placeholder="house_nr"
                           minlength="3"
                           required
                           value="{{ old('house_nr', $customer->house_nr )}}">
                    @error('house_nr')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-1"> <label for="box_nr" style="padding-top: 20px;">Bus</label>
                    <input type="text" name="box_nr" id="box_nr"
                           class="form-control @error('box_nr') is-invalid @enderror"
                           placeholder="box_nr"></div>

                <div class="col-md-6"> <label for="birth_date" style="padding-top: 20px;">Geboortedatum</label>
                    <input type="text" name="birth_date" id="birth_date"
                           class="form-control @error('birth_date') is-invalid @enderror"
                           placeholder="Geboortedatum"
                           minlength="4"
                           required
                           value="{{ old('birth_date', $customer->birth_date )}}">
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

                <div class="col-md-6"> <label for="note" style="padding-top: 20px;">extra opmerking</label>
                    <input type="text" name="note" id="note"
                           class="form-control @error('note') is-invalid @enderror"
                           placeholder="extra opmerking"
                           value="{{ old('note', $customer->note )}}">
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror</div>

            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


