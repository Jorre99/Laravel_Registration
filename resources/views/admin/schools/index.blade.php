@extends('layouts.template')

@section('title', 'Schools')

@section('main')

    <div class="row">
        <h1 class="col-2">Scholen</h1>

    </div>

    <form method="get" action="/admin/schools" id="searchForm">
        <div class="row" >
            <div class="col-sm-7 mb-2">
                <label for="school">Zoeken op naam of email</label>
                <input type="text" class="form-control" name="school" id="school"
                       value="{{ request()->school }}" placeholder="Zoeken op naam of email">
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
    @if ($schools->count() == 0 )
        <div class="alert alert-danger alert-dismissible fade show">
            Can't find any school with <b>'{{ request()->school }}'</b> in the name/ email.
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
                    <a href="/admin/schools/create" id="school_add" class="btn btn-outline-success btn-add" data-toggle="tooltip" title="School toevoegen">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>


                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Tel nr</th>
                    <th>stad</th>
                    <th>straat</th>
                    <th>huisnr</th>

                </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td>{{ $school->id }}</td>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->email }}</td>
                        <td>{{ $school->telephone }}</td>
                        <td>{{ $school->city }}</td>
                        <td>{{ $school->street }}</td>
                        <td>{{ $school->house_nr }}</td>

                            <td data-id="{{ $school->id }}"
                                data-name="{{ $school->name }}">
                                <div class="btn-group btn-group-sm">
                                    <form action="/admin/schools/{{ $school->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="btn-group btn-group-sm">
{{--                                            add appointment--}}
                                            <a href="/admin/pool_appointments/{{ $school->id }}" class="btn btn-outline-success"
                                               data-toggle="tooltip"
                                               title="Afspraak toevoegen voor {{ $school->name }}">
                                                <i class="fas fa-plus"></i>
                                            </a>

                                            <a href="/admin/schools/{{$school->id}}" class="btn btn-outline-success"
                                               data-toggle="tooltip"
                                               title="Facturen van {{ $school->name }} bekijken">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>

                                            <a href="/admin/schools/{{ $school->id }}/edit" class="btn btn-outline-success"
                                               data-toggle="tooltip"
                                               title="De school: {{ $school->name }} aanpassen">
                                                <i class="fas fa-edit"></i>
                                            </a>
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


