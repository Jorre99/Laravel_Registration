@extends('layouts.template')

@section('main')
    <h4>Zwemlessen bekijken</h4>
    <div class="row">
        <table class="col-8" style="width: 100%">
            <tr>
                <th>Dag</th>
                <th>Uur</th>
                <th>Zwemleraar</th>
                <th>Zwemmers</th>
            </tr>

            @foreach($swimminglessons as $swimminglesson)
                @if($swimminglesson->status_swimming_lesson == true )
                    <tr>
                        <td>{{ $swimminglesson->weekday }}</td>
                        <td>{{ $swimminglesson->start_time }} - {{ $swimminglesson->end_time }}</td>
                        <td>{{ $swimminglesson->user->name }} {{ $swimminglesson->user->sur_name }}</td>
                        <td>
                            @foreach($swimminglessonslists as $swimminglessonslist)
                                @if($swimminglessonslist->swimming_lesson_id == $swimminglesson->id and $swimminglessonslist->status_customer_swimming_lesson == "actief")
                                    {{ $swimminglessonslist->customer->first_name }} {{ $swimminglessonslist->customer->name }}
                                    ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <a class="col-12 mt-3" href="/auth/waitinglists">Wachtlijst aanpassen</a>
        <a class="col-12" href="/auth/assignswimmers">Zwemlessen Toekennen</a>
    </div>
@endsection
