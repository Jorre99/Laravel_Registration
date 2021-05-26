@extends('layouts.template')

@section('title', 'Customers')

@section('main')

    <div class="row">
        <h1 class="col-2">De zwemlessen</h1>
    </div>
    <tbody>
    <p>Hier komt al de informatie over de zwemlessen.</p>
    <p>Ook komen hier foto's ter illustratie van de zwemlessen</p>
    <div class="btn-group btn-group-lg">
        <a href="/customers/create" id="new_customer" class="btn btn-outline-success btn-add" data-toggle="tooltip" title="Add customer">
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
    </tbody>
@endsection


