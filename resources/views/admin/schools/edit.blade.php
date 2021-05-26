@extends('layouts.template')

@section('title', 'schools')

@section('main')
    @include('shared.alert')
    <div class="row">
        <div class="table-responsive col-6">
            @foreach($classes as $class)
                @if($loop->first)

                    <form class="" action="/admin/schools/{{ $class->school->id}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <h4 class="">{{ $class->school->name}} aanpassen</h4>

                            <label for="name">Naam</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Name"
                                   value="{{ old('name', $class->school->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="email" style="padding-top: 20px;">E-mailadress</label>
                            <input type="text" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="email"
                                   minlength="3"
                                   required
                                   value="{{ old('email', $class->school->email )}}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="telephone" style="padding-top: 20px;">Telefoonnummer</label>
                            <input type="text" name="telephone" id="telephone"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="telephone"
                                   minlength="3"
                                   required
                                   value="{{ old('email', $class->school->telephone )}}">
                            @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="street" style="padding-top: 20px;">Straat</label>
                            <input type="text" name="street" id="street"
                                   class="form-control @error('street') is-invalid @enderror"
                                   placeholder="street"
                                   minlength="3"
                                   required
                                   value="{{ old('email', $class->school->street )}}">
                            @error('street')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="house_nr" style="padding-top: 20px;">Huisnummer</label>
                            <input type="text" name="house_nr" id="house_nr"
                                   class="form-control @error('street') is-invalid @enderror"
                                   placeholder="house_nr"
                                   minlength="3"
                                   required
                                   value="{{ old('house_nr', $class->school->house_nr )}}">
                            @error('house_nr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="box_nr" style="padding-top: 20px;">Bus</label>
                            <input type="text" name="box_nr" id="box_nr"
                                   class="form-control @error('box_nr') is-invalid @enderror"
                                   placeholder="box_nr">


                            <label for="postal_code" style="padding-top: 20px;">Postcode</label>
                            <input type="text" name="postal_code" id="postal_code"
                                   class="form-control @error('postal_code') is-invalid @enderror"
                                   placeholder="postal_code"
                                   minlength="4"
                                   required
                                   value="{{ old('postal_code', $class->school->postal_code )}}">
                            @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="city" style="padding-top: 20px;">Stad</label>
                            <input type="text" name="city" id="city"
                                   class="form-control @error('city') is-invalid @enderror"
                                   placeholder="city"
                                   minlength="4"
                                   required
                                   value="{{ old('city', $class->school->city )}}">
                            @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-success">Opslaan</button>
                    </form>

        </div>

        <div class="table-responsive col-6">
            <h3>Klassen</h3>

            <form action="/admin/classes/create">
                <input type="hidden" name="id" id="id"
                       class="form-control"
                       placeholder="Name"
                       value="{{ $class->school->id }}">

                <button type="submit" class="btn btn-success">Klas Toevoegen</button>
                @endif
                @endforeach
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Klasnaam</th>
                    <th>Subsidies</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->class_name }}</td>
                        <td>
                            @if($class->is_subsidized == 1)
                                <i class="fas fa-check"></i>
                            @endif

                            @if($class->is_subsidized == 0)
                                <i class="fas fa-times"></i>
                            @endif
                        </td>
                        <td>
                            <form action="/admin/classes/{{ $class->id }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/classes/{{ $class->id }}/edit" class="btn btn-outline-success"
                                       data-toggle="tooltip"
                                       title="De klas:{{ $class->name }} aanpassen">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger deleteClasses"
                                            data-toggle="tooltip" data-id="{{$class->id}}"
                                            title="De klas: {{ $class->name }} verwijderen">
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
            $('.deleteClasses').click(function () {
                let msg = `Deze klas verwijderen?`;
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

