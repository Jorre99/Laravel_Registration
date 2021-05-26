@extends('layouts.template')

@section('title', 'poolparties')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">Zwemfeest op: {{ $pool_party->date}} aanpassen.</h4>
        <form action="/admin/poolparties/{{ $pool_party->id}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">

                <label for="date">Datum</label>
                <input type="date" name="date" id="date"
                       class="form-control @error('date') is-invalid @enderror"
                       placeholder="jjjj/mm/dd"
                       value="{{ old('date', $pool_party->date) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="start_time" style="padding-top: 20px;">Start uur</label>
                <input type="time" name="start_time" id="start_time"
                       class="form-control @error('start_time') is-invalid @enderror"
                       placeholder="start uur"
                       minlength="3"
                       required
                       value="{{ old('start_time', $pool_party->start_time )}}">
                @error('start_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="end_time" style="padding-top: 20px;">Eind uur</label>
                <input type="time" name="end_time" id="end_time"
                       class="form-control @error('end_time') is-invalid @enderror"
                       placeholder="eind uur"
                       minlength="3"
                       required
                       value="{{ old('end_time', $pool_party->end_time )}}">
                @error('end_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="price_id" style="padding-top: 20px;">Prijs</label>
                <select name="price_id" id="price_id" class="form-control @error('price_id') is-invalid @enderror"
                        placeholder="prijs" required>
                    <option value="{{ old('price_id', $pool_party->price_id) }}">{{ $pool_party->price->name }}</option>
                    @foreach($prices as $price)
                        <option value="{{$price->id}}">{{ $price->name }}</option>
                    @endforeach
                </select>

                <div class="col-12 pt-3">
                    <label for="status_pool_party">status: </label>
                    <select name="status_pool_party" id="status_pool_party" required>
                        <option
                                value="{{ old('status_pool_party', $pool_party->status_pool_party )}}">{{ old('status_pool_party', $pool_party->status_pool_party )}}</option>
                        <option value="Beschikbaar">Beschikbaar</option>
                        <option value="Aangevraagd">Aangevraagd</option>
                        <option value="Goedgekeurd">Goedgekeurd</option>
                        <option value="Afgekeurd">Afgekeurd</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


