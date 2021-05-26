@extends('layouts.template')

@section('title', 'Swimming_lesson aanmaken')

@section('main')
    <h4>Een nieuwe zwemles aanmaken</h4>
    <form action="/admin/swimminglesson" method="post">
        @method('post')
        @csrf

        <div class="form-group row">
            <div class="col-3 pt-3">
                <label for="weekday">Weekdag: </label>
                <select name="weekday" id="weekday"  required>
                    <option value="Maandag">Maandag</option>
                    <option value="dinsdag">Dinsdag</option>
                    <option value="Woensdag">Woensdag</option>
                    <option value="Donderdag">Donderdag</option>
                    <option value="Vrijdag">Vrijdag</option>
                    <option value="Zaterdag">Zaterdag</option>
                    <option value="Zondag">Zondag</option>
                </select>
            </div>
            <div class="col-9 pt-3">
                <label for="user_id">Zwemleraar: </label>
                <select name="user_id" id="user_id" required>
                    @foreach($users as $user)
                        @if($user->is_swimmingInstructor == 1)
                            <option
                                value="{{ $user->id }}"> {{ $user->name }} {{ $user->sur_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-3 pt-3">
                <label for="start_time">Start uur: </label>
                <input  name="start_time" id="start_time" type="time" required>
            </div>
            <div class="col-9 pt-3">
                <label for="end_time">Eind uur: </label>
                <input name="end_time" id="end_time" type="time" required>
            </div>

            <div class="col-12 pt-3">
                <input type="radio" name="status" id="actief" value="1" checked  required>
                <label for="actief">actief</label>
            </div>
            <div class="col-12">
                <input type="radio" name="status" id="niet-actief" value="0">
                <label for="niet-actief">niet actief</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Zwemles oplsaan</button>
    </form>


@endsection
