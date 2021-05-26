@extends('layouts.template')

@section('main')
    <h4>Zwemmers toekennnen aan een zwemles</h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Dag</th>
                <th>Uur</th>
                <th>Zwemleraar</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_swimming_lessons as $swimminglesson)
                @if($swimminglesson->status_customer_swimming_lesson == "wachtend")
                    <tr>
                        <td>{{ $swimminglesson->swimming_lesson->weekday }}</td>
                        <td>{{ $swimminglesson->swimming_lesson->start_time }} - {{ $swimminglesson->swimming_lesson->end_time }}</td>
                        <td>{{ $swimminglesson->swimming_lesson->user->name }} {{ $swimminglesson->swimming_lesson->user->sur_name }}</td>
                        <td>{{ $swimminglesson->status_customer_swimming_lesson }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/auth/assignswimmers/{{ $swimminglesson->id }}/edit"
                                   class="btn btn-outline-success"
                                   data-toggle="tooltip"
                                   title="De zwemles: {{ $swimminglesson->id }} aanpassen">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
