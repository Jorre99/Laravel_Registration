<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@extends('layouts.template')

@section('title', 'Contact us')

@section('main')

    <h1>Contact us</h1>
    @include('shared.alert')

    @if (!session()->has('success'))
        <form action="/contact-us" method="post" novalidate>
            @csrf

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name"
                               class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                               placeholder="Uw naam"
                               required
                               value="{{ old('name') }}">
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                               class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                               placeholder="E-mailadres"
                               required
                               value="{{ old('email') }}">
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="message">Onderwerp</label>
                        <select name="contact" id="contact" rows="5"
                                class="form-control {{ $errors->first('contact') ? 'is-invalid' : 'Select a contact' }}">
                            <option value="">Over welk onderwerp wil je graag contact opnemen?</option>
                            <option value="Zwemfeest">Zwemfeest</option>
                            <option value="Zwemlessen">Zwemlessen</option>
                            <option value="Scholen">Scholen</option>
                            <option value="Andere">Andere</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="message">Bericht</label>
                        <textarea name="message" id="message" rows="5"
                                  class="form-control {{ $errors->first('message') ? 'is-invalid' : '' }}"
                                  placeholder="Uw bericht"
                                  required
                                  minlength="10">{{ old('message') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Bericht versturen</button>
        </form>
    @endif
@endsection

</body>
</html>
