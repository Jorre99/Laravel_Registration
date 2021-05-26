@extends('layouts.template')

@section('title', 'prices')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">Nieuw tarief aanmaken:</h4>
        <form action="/admin/prices/" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <label for="name">Categorie</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Naam">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="price" style="padding-top: 20px;">Prijs</label>
                <input type="text" name="price" id="price"
                       class="form-control @error('price') is-invalid @enderror"
                       placeholder="prijs"
                       minlength="3"
                       required>
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


