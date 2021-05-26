@extends('layouts.template')

@section('title', 'prices')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">{{ $meal->name}} aanpassen</h4>
        <form action="/admin/meals/{{ $meal->id}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">

                <label for="name">Maaltijd</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Maaltijd"
                       value="{{ old('name', $meal->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="price" style="padding-top: 20px;">Prijs</label>
                <input type="text" name="price" id="price"
                       class="form-control @error('price') is-invalid @enderror"
                       placeholder="prijs"
                       minlength="3"
                       required
                       value="{{ old('price', $meal->price )}}">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row" style="padding-top: 20px;">
                    <div class="col">
                        <input type="checkbox" id="status_meal" name="status_meal" value='1' {{ old('status_meal', $meal->status_meal)? 'checked="checked"':null }}>
                        <label for="status_meal">Maaltijd activeren.</label><br>
                    </div>
                </div>


                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


