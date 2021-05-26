@extends('layouts.template')

@section('title', 'Schools')

@section('main')
    @include('shared.alert')

    <div class="form-check-inline row">
        <h4 class="col-12">Nieuwe klas aanmaken</h4>
        <form action="/admin/classes/" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <label for="name">Klasnaam</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input type="hidden" name="school_id" id="school_id"
                       class="form-control"
                       placeholder="Name"
                       value="{{$school_id}}">

                <div class="row" style="padding-top: 20px;">
                    <div class="col">
                        <input type="checkbox" id="is_gesubsidized" name="is_gesubsidized" value='1'>
                        <label for="is_gesubsidized">Subsidie</label><br>
                    </div>
                </div>




            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>
    </div>
@endsection


