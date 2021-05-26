@extends('layouts.template')

@section('title', 'poolparties')

@section('main')
    <h2>Zwemfeesten</h2>
    @include('shared.alert')

    <div class="row">
        <div class="table-responsive col-6">
            <h3>Overzicht van de zwemfeesten.</h3>
            <p>
                <a href="/admin/poolparties/create" class="btn btn-outline-success">
                    <i class="fas fa-plus-circle mr-1"></i>Nieuw feest
                </a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Start uur</th>
                    <th>Eind uur</th>
                </tr>
                </thead>
                <tbody>
                @foreach($poolparties as $pool_party)
                    <tr>
                        <td>{{ $pool_party->date }}</td>
                        <td>{{ $pool_party->start_time }}</td>
                        <td>{{ $pool_party->end_time }}</td>
                        <td>
                            <form action="/admin/poolparties/{{ $pool_party->id }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/poolparties/{{ $pool_party->id }}/edit" class="btn btn-outline-success"
                                       data-toggle="tooltip"
                                       title="Het zwemfeest op {{ $pool_party->date }} aanpassen">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-delete deletePool_party"
                                            data-toggle="tooltip" data-id="{{$pool_party->id}}"
                                            title="Het zwemfeest op {{ $pool_party->date }} verwijderen">
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
        <div class="table-responsive col-12">
            <h3>Volgende zwemfeesten zijn aangevraagd:</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Start uur</th>
                    <th>Eind uur</th>
                    <th>Aantal kinderen</th>
                    <th>Gereserveerd door</th>
                </tr>
                </thead>
                <tbody>
                @foreach($poolparties as $pool_party)
                    @if($pool_party->status_pool_party == 'Aangevraagd')
                    <tr>
                        <td>{{ $pool_party->date }}</td>
                        <td>{{ $pool_party->start_time }}</td>
                        <td>{{ $pool_party->end_time }}</td>
                        <td>{{ $pool_party->pupil_count }}</td>
                        <td>{{ $pool_party->customer->first_name }} {{ $pool_party->customer->name}}</td>
                        <td>
                            <form action="/admin/customers/{{ $pool_party->id }}" method="post">
                                @method('put')
                                @csrf
                                <button type="submit" name="accept">Goedkeuren</button>
                            </form>
                        </td>
                        <td>
                            <form action="/admin/customers2/{{ $pool_party->id }}" method="post">
                                @method('put')
                                @csrf
                                <button type="submit" name="reject">Afkeuren</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script_after')
    <script>
        $(function () {
            $('.deletePool_party').click(function () {
                let date = $(this).closest('td').data('date');
                let msg = `Het zwemfeestje op ${date} verwijderen?`;
                let id = $(this).data('id');
                //console.log(id);
                // if(confirm(msg)) {
                //     $(this).closest('form').submit();
                // }
                // Show Noty
                //console.log($(`[data-id = ${id}]`));
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
{{--@section('script_after')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            // Delete this record--}}
{{--            @auth()--}}
{{--            $('#deletePool_party').click(function () {--}}
{{--                let id = '{{ $pool_party->id }}';--}}
{{--                console.log(`delete pool_party ${id}`);--}}
{{--                // Show Noty--}}
{{--                let modal = new Noty({--}}
{{--                    text: '<p>Delete the record <b>{{ $pool_party->date }}</b>?</p>',--}}
{{--                    buttons: [--}}
{{--                        Noty.button('Delete record', 'btn btn-danger', function () {--}}
{{--                            // Delete record and close modal--}}
{{--                            let pars = {--}}
{{--                                '_token': '{{ csrf_token() }}',--}}
{{--                                '_method': 'delete'--}}
{{--                            };--}}
{{--                            $.post(`/admin/poolparties/${id}`, pars, 'json')--}}
{{--                                .done(function (data) {--}}
{{--                                    console.log('data', data);--}}
{{--                                    // Show toast--}}
{{--                                    Zwembad.toast({--}}
{{--                                        type: data.type,--}}
{{--                                        text: data.text--}}
{{--                                    });--}}
{{--                                    // After 2 seconds, redirect to the public master page--}}
{{--                                    setTimeout(function () {--}}
{{--                                        $(location).attr('href', '/index'); // jQuery--}}
{{--                                        // window.location = '/shop'; // JavaScript--}}
{{--                                    }, 2000);--}}
{{--                                })--}}
{{--                                .fail(function (e) {--}}
{{--                                    console.log('error', e);--}}
{{--                                });--}}
{{--                            modal.close();--}}
{{--                        }),--}}
{{--                        Noty.button('Cancel', 'btn btn-secondary ml-2', function () {--}}
{{--                            modal.close();--}}
{{--                        })--}}
{{--                    ]--}}
{{--                }).show();--}}
{{--            });--}}
{{--            @endauth--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}

{{--// noty toast--}}
{{--$('.deletePool_party').click(function () {--}}
{{--new Noty({--}}
{{--type: 'success',--}}
{{--text: 'test text',--}}
{{--}).show();--}}
{{--let msg = `Delete this Pool party?`;--}}
{{--let id = $(this).data('id');--}}
{{--//console.log(id);--}}
{{--// if(confirm(msg)) {--}}
{{--//     $(this).closest('form').submit();--}}
{{--// }--}}
{{--// Show Noty--}}
{{--console.log($(`[data-id = ${id}]`));--}}
{{--let modal = new Noty({--}}
{{--type: 'warning',--}}
{{--text: 'Delete this pool party',--}}
{{--buttons: [--}}
{{--Noty.button('Delete', `btn btn-success`, function () {--}}
{{--// Delete genre and close modal--}}

{{--$(`[data-id = ${id}]`).closest('form').submit();--}}
{{--modal.close();--}}
{{--}),--}}
{{--Noty.button('Cancel', 'btn btn-secondary ml-2', function () {--}}
{{--modal.close();--}}
{{--})--}}
{{--]--}}
{{--}).show();--}}
{{--})--}}
{{--});--}}



