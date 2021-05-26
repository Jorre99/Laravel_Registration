@extends('layouts.template')

@section('title', 'Swimming_lessons')

@section('main')
    <h1>Zwemlessen beheren</h1>
    @include('shared.alert')
    <p>
        <a href="/admin/swimminglesson/create" class="btn btn-outline-success">
            <i class="fas fa-plus-circle mr-1"></i>Zwemles aanmaken
        </a>
    </p>
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
            @foreach($swimming_lessons as $swimminglesson)
                <tr>
                    <td>{{ $swimminglesson->weekday }}</td>
                    <td>{{ $swimminglesson->start_time }} - {{ $swimminglesson->end_time }}</td>
                    <td>{{ $swimminglesson->user->name }} {{ $swimminglesson->user->sur_name }}</td>
                    <td>
                        @if($swimminglesson->status_swimming_lesson == false)
                            niet actief
                        @elseif($swimminglesson->status_swimming_lesson == true)
                            actief
                        @endif
                    </td>
                    <td>
                        <form action="/admin/swimminglesson/{{ $swimminglesson->id }}" method="post">
                            @method('delete')
                            @csrf
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/swimminglesson/{{ $swimminglesson->id }}/edit"
                                   class="btn btn-outline-success"
                                   data-toggle="tooltip"
                                   title="De zwemles op {{ $swimminglesson->weekday }} aanpassen">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger deleteLessons"
                                        data-toggle="tooltip" data-id="{{$swimminglesson->id}}"
                                        title="De zwemles op {{ $swimminglesson->weekday }} aanpassen">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script_after')
    <script>
        $(function () {
            $('.deleteLessons').click(function () {
                let msg = `De zwemles verwijderen?`;
                let id = $(this).data('id');
                //console.log(id);
                // if(confirm(msg)) {
                //     $(this).closest('form').submit();
                // }
                // Show Noty
                console.log($(`[data-id = ${id}]`));
                let modal = new Noty({
                    type: 'warning',
                    text: msg,
                    buttons: [
                        Noty.button('Delete', `btn btn-success`, function () {
                            // Delete genre and close modal

                            $(`[data-id = ${id}]`).closest('form').submit();
                            modal.close();
                        }),
                        Noty.button('Cancel', 'btn btn-secondary ml-2', function () {
                            modal.close();
                        })
                    ]
                }).show();
            })
        });
    </script>
@endsection
