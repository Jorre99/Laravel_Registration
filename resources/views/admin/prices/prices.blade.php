@extends('layouts.template')

@section('title', 'prices')

@section('main')
    <h2>Zwemles en maaltijd prijzen.</h2>
    @include('shared.alert')

    <div class="row">
        <div class="table-responsive col-6">
            <h3>Tarieven</h3>
            <p>
                <a href="/admin/prices/create" class="btn btn-outline-success">
                    <i class="fas fa-plus-circle mr-1"></i>Tarief
                </a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>Categorie</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{ $price->name }}</td>
                        <td><i class="fas fa-euro-sign p-2"></i>{{ $price->price }}</td>
                        <td>
                            <form action="/admin/prices/{{ $price->id }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/prices/{{ $price->id }}/edit" class="btn btn-outline-success"
                                       data-toggle="tooltip"
                                       title="Het tarief van {{ $price->name }} aanpassen">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger deletePrices"
                                            data-toggle="tooltip" data-id="{{$price->id}}"
                                            title="Het tarief {{ $price->name }} verwijderen">
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

        <div class="table-responsive col-6">
            <h3>Maaltijden</h3>
            <p>
                <a href="/admin/meals/create" class="btn btn-outline-success">
                    <i class="fas fa-plus-circle mr-1"></i>Maaltijd
                </a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th>Maaltijd</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meals as $meal)
                    <tr>
                        <td>{{ $meal->name }}</td>
                        <td><i class="fas fa-euro-sign p-2"></i>{{ $meal->price }}</td>
                        @if ($meal->status_meal === 1)
                            <td><i class="fas fa-check"></i></td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <form action="/admin/meals/{{ $meal->id }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/meals/{{ $meal->id }}/edit" class="btn btn-outline-success"
                                       data-toggle="tooltip"
                                       title="De maaltijd {{ $meal->name }} aanpassen">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger deleteMeals"
                                            data-toggle="tooltip" data-id="{{$meal->id}}"
                                            title="De maaltijd {{ $meal->name }} verwijderen">
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
    </div>

@endsection
@section('script_after')
    <script>
        $(function () {
            $('.deletePrices').click(function () {
                let msg = `Deze prijs verwijderen?`;
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
        $(function () {
            $('.deleteMeals').click(function () {
                let msg = `de maaltijd verwijderen?`;
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


