@extends('layouts.template')

@section('title', 'poolparties')

@section('main')
    <h4>Zwemfeest aanmaken</h4>
    @include('shared.alert')

    <div class="form-check-inline row">
        <form action="/admin/poolparties/" method="post">
            @method('post')
            @csrf
            <div class="form-group">

                <label for="date">Datum</label>
                <input type="date" name="date" id="date"
                       class="form-control @error('date') is-invalid @enderror"
                       placeholder="jjjj/mm/dd">
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="start_time" style="padding-top: 20px;">Start uur</label>
                <input name="start_time" id="start_time" type="time"
                       class="form-control @error('start_time') is-invalid @enderror"
                       placeholder="start uur"
                       required>
                @error('start_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="end_time" style="padding-top: 20px;">Eind uur</label>
                <input type="time" name="end_time" id="end_time"
                       class="form-control @error('end_time') is-invalid @enderror"
                       placeholder="eind uur"
                       minlength="3"
                       required>
                @error('end_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="price_id" style="padding-top: 20px;">Prijs</label>
                <select name="price_id" id="price_id" class="form-control @error('price_id') is-invalid @enderror"
                        placeholder="prijs" required>
                    @foreach($prices as $price)
                        <option value="{{$price->id}}">{{ $price->name }}</option>
                    @endforeach
                </select>


            <button type="submit" class="btn btn-success" style="margin-top: 20px;">Opslagen</button>
            </div>
        </form>
    </div>
@endsection


