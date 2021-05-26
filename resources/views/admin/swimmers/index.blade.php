@extends('layouts.template')

@section('title', 'Zwemmers')

@section('main')


    <div class="row">
        <h1 class="col-2">Klanten</h1>

    </div>

    <form method="get" action="/auth/swimmers" id="searchForm">
        <div class="row" >
            <div class="col-sm-7 mb-2">
                <label for="customer">Zoeken op naam of email</label>
                <input type="text" class="form-control" name="customer" id="customer"
                       value="{{ request()->customer }}" placeholder="Zoeken op naam of email">
            </div>
            <div class="col-sm-5 mb-2">
                <label for="order">Sorteren op</label>
                <select class="form-control" name="order" id="order">
                    <option value="%">ID (1 => ...)</option>
                    <option value="nameA" {{ (request()->order ==  'nameA' ? 'selected' : '') }}>Name (A => Z)</option>
                    <option value="nameZ" {{ (request()->order ==  'nameZ' ? 'selected' : '') }}>Name (Z => A)</option>
                    <option value="emailA" {{ (request()->order ==  'emailA' ? 'selected' : '') }}>Email (A => Z)</option>
                    <option value="emailZ" {{ (request()->order ==  'emailZ' ? 'selected' : '') }}>Email (Z => A)</option>
                </select>
            </div>
        </div>
    </form>
    @if ($customers->count() == 0 )
        <div class="alert alert-danger alert-dismissible fade show">
            Kan geen klanten vinden <b>'{{ request()->customer }}'</b> met de volgende naam/ email.
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @else
        @include('shared.alert')
        <div class="table-responsive">
            <table class="table">
                <thead>

                <div class="btn-group btn-group-lg">
                    <a href="/auth/swimmers/create" id="swimmer_add" class="btn btn-outline-success btn-add" data-toggle="tooltip" title="Klant aanmaken">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>


                <tr>
                    <th>Naam</th>
                    <th>Voornaam</th>
                    <th>Tel nr</th>
                    <th>Email</th>
                    <th>stad</th>
                    <th>straat</th>
                    <th>huisnr</th>

                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->telephone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->street }}</td>
                        <td>{{ $customer->house_nr }}</td>

                        <td data-id="{{ $customer->id }}"
                            data-name="{{ $customer->name }}">
                            <div class="btn-group btn-group-sm">
                                <form action="/auth/swimmers/{{ $customer->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="btn-group btn-group-sm">

                                        <a href="/auth/swimmers/{{ $customer->id }}/edit" class="btn btn-outline-success"
                                           data-toggle="tooltip"
                                           title="De klant: {{ $customer->name }} aanpassen">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger deleteSwimmer"
                                                data-toggle="tooltip" data-id="{{$customer->id}}"
                                                title="De klant: {{ $customer->name }} verwijderen">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
@section('script_after')
    <script>
        $(function () {
            $('.deleteSwimmer').click(function () {
                let name = $(this).closest('td').data('name');
                let msg = `De zwemmer ${name} verwijderen?`;
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


