@extends('layouts.template')

@section('title', 'classes')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">{{ $class->class_name}} aanpassen</h4>
        <form action="/admin/classes/{{ $class->id}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">

                <label for="name">klas naam</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Klasnaam"
                       value="{{ old('name', $class->class_name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row" style="padding-top: 20px;">
                    <div class="col">
                        <input type="checkbox" id="is_subsidized" name="is_subsidized" value='1' {{ old('is_subsidized', $class->is_subsidized)? 'checked="checked"':null }}>
                        <label for="is_subsidized">Subsidie</label><br>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


