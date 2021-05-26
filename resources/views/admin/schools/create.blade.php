@extends('layouts.template')

@section('title', 'Schools')

@section('main')
    @include('shared.alert')

    <h4 class="col-12">Een school aanmaken:</h4>
    <div class="form-check-inline row">
        <form action="/admin/schools/" class="col-12" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Naam"
                               minlength="3"
                               required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="email">E-mailadress</label>
                        <input type="text" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="email"
                               minlength="3"
                               required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="telephone">Telefoonnummer</label>
                        <input type="text" name="telephone" id="telephone"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Telefoonnummer"
                               minlength="3"
                               required>
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="street">Straat</label>
                        <input type="text" name="street" id="street"
                               class="form-control @error('street') is-invalid @enderror"
                               placeholder="straat"
                               minlength="3"
                               required>
                        @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-1">
                        <label for="house_nr">Huisnummer</label>
                        <input type="text" name="house_nr" id="house_nr"
                               class="form-control @error('street') is-invalid @enderror"
                               placeholder="huisnummer"
                               minlength="3"
                               required>
                        @error('house_nr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-1">
                        <label for="box_nr">Bus</label>
                        <input type="text" name="box_nr" id="box_nr"
                               class="form-control @error('box_nr') is-invalid @enderror"
                               placeholder="Bus">
                    </div>
                    <div class="col-6">
                        <label for="postal_code">Postcode</label>
                        <input type="text" name="postal_code" id="postal_code"
                               class="form-control @error('postal_code') is-invalid @enderror"
                               placeholder="Postcode"
                               minlength="4"
                               required>
                        @error('postal_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="city">Stad</label>
                        <input type="text" name="city" id="city"
                               class="form-control @error('city') is-invalid @enderror"
                               placeholder="Stad"
                               minlength="4"
                               required>
                        @error('postal_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


