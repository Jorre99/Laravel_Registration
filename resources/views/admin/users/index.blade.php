@extends('layouts.template')

@section('title', 'Users')

@section('main')

    <div class="row">
        <h1 class="col-2">Gebruikers</h1>

    </div>

    <form method="get" action="/admin/users" id="searchForm">
        <div class="row" >
            <div class="col-sm-7 mb-2">
                <label for="user">Zoeken op naam of email</label>
                <input type="text" class="form-control" name="user" id="user"
                       value="{{ request()->user }}" placeholder="Zoeken op naam of email">
            </div>
            <div class="col-sm-5 mb-2">
                <label for="order">Sorteren op:</label>
                <select class="form-control" name="order" id="order">
                    <option value="%">ID (1 => ...)</option>
                    <option value="nameA" {{ (request()->order ==  'nameA' ? 'selected' : '') }}>Name (A => Z)</option>
                    <option value="nameZ" {{ (request()->order ==  'nameZ' ? 'selected' : '') }}>Name (Z => A)</option>
                    <option value="emailA" {{ (request()->order ==  'emailA' ? 'selected' : '') }}>Email (A => Z)</option>
                    <option value="emailZ" {{ (request()->order ==  'emailZ' ? 'selected' : '') }}>Email (Z => A)</option>
                    <option value="notActive" {{ (request()->order ==  'notActive' ? 'selected' : '') }}>Not active</option>
                    <option value="admin" {{ (request()->order ==  'admin' ? 'selected' : '') }}>Admin</option>
                </select>
            </div>
        </div>
    </form>
    @if ($users->count() == 0 )
        <div class="alert alert-danger alert-dismissible fade show">
            Can't find any user with <b>'{{ request()->user }}'</b> in the name/ email.
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
                    <a href="/admin/users/create" id="user_add" class="btn btn-outline-success btn-add" data-toggle="tooltip" title="Gebruiker toevoegen">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>


                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Tel nr</th>
                    <th>Contactpersoon</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->sur_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        @if ($user->is_contactpersoon === 1)
                            <td><i class="fas fa-check"></i></td>
                        @else
                            <td></td>
                        @endif
                        @if ($user->admin === 1)
                            <td><i class="fas fa-check"></i></td>
                        @else
                            <td></td>
                        @endif
                        @if($user->id === $huidige_user->id)
                            <td data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}">
                                <div class="btn-group btn-group-sm">
                                    <button id="edit" class="btn btn-outline-success btn-edit" style="cursor:not-allowed;" disabled>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-delete" id="delete" style="cursor:not-allowed;" disabled>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        @else
                            <td data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}">
                                <div class="btn-group btn-group-sm">
                                    <form action="/admin/users/{{ $user->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="btn-group btn-group-sm">
                                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-outline-success"
                                               data-toggle="tooltip"
                                               title="De gebruiker: {{ $user->name }} aanpassen">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger deleteUser"
                                                    data-toggle="tooltip" data-id="{{$user->id}}"
                                                    title="De gebruiker: {{ $user->name }} verwijderen">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form>



                                </div>
                            </td>
                        @endif
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
            $('.deleteUser').click(function () {
                let name = $(this).closest('td').data('name');
                let msg = `${name} verwijderen?`;
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
                    timeout: false,
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
