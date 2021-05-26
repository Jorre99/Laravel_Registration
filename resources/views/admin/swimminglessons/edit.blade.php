@extends('layouts.template')

@section('main')
    <h4>De zwemles van {{$swimming_lesson->weekday}} aanpassen.</h4>
    <form action="/admin/swimminglesson/{{$swimming_lesson->id}}" method="post">
        @method('put')
        @csrf

        <div class="form-group row">
            <div class="col-3 pt-3">
                <label for="weekday">Weekdag: </label>
                <select name="weekday" id="weekday" required>
                    <option
                        value="{{ old('weekday', $swimming_lesson->weekday)}}">{{ old('weekday', $swimming_lesson->weekday)}}</option>
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
                    <option
                        value="{{ old('user_id', $swimming_lesson->user_id) }}">{{ old('name', $swimming_lesson->user->name) }} {{old('sur_name', $swimming_lesson->user->sur_name)}}</option>
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
                <input name="start_time" id="start_time" type="time"
                       value="{{ old('start_time', $swimming_lesson->start_time) }}" required>
            </div>
            <div class="col-9 pt-3">
                <label for="end_time">Eind uur: </label>
                <input name="end_time" id="end_time" type="time"
                       value="{{ old('end_time', $swimming_lesson->end_time) }}" required>
            </div>

            <div class="col-12 pt-3">
                <input type="radio" name="status" id="actief" value="1"
                       {{ old('status_swimming_lesson', $swimming_lesson->status_swimming_lesson == 1)? 'checked="checked"':null  }}  required>
                <label for="actief">actief</label>
            </div>
            <div class="col-12">
                <input type="radio" name="status" id="niet-actief" value="0"
                    {{ old('status_swimming_lesson', $swimming_lesson->status_swimming_lesson == 0)? 'checked="checked"':null  }}>
                <label for="niet-actief">niet actief</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Oplsaan</button>
    </form>
@endsection
