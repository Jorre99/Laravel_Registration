@extends('layouts.template')

@section('main')
    <h2>Maak hier uw zwemafspraak</h2>

    <h3>{{$school->name}}</h3>


    <div class="dropdown">
        <form action="/admin/pool_appointments/" method="post">
            @method("post")
            @csrf
            <label for="school_id">{{$school->name}}</label>
            <input type="hidden" name="school_id" value="{{$school->id}}">

            <label for="school_class">Kies een klas: </label>
            <select name="school_class" id="school_class">
                @foreach($school_classes as $class)
                    <option value="{{$class->id}}">{{$class->class_name}}</option>
                @endforeach
            </select>

            <br>
            <label for="date">Datum</label>
            <input type="date"
                   name="date" id="date"
                   class="col-6 form-control @error('date') is-invalid @enderror"
                   placeholder="datum">
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="pupil_count">Aantal zwemmers</label>
            <input type="number" name="pupil_count" id="pupil_count"
                   class="col-6 form-control @error('pupil_count') is-invalid @enderror"
                   placeholder="Aantal zwemmers">
            @error('pupil_count')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection
