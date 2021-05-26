@extends('layouts.template')

@section('title', 'poolparties')

@section('main')
    <h4>Zwemfeesten</h4>
    @include('shared.alert')

    <div class="row">
        <div class="table-responsive col-6">
            <h5>Op volgende datums kan een zwemfeest aangevraagd worden</h5>

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
                    @if($pool_party->status_pool_party == 'Beschikbaar' and $pool_party->date > $date)
                    <tr>
                        <td>{{ $pool_party->date }}</td>
                        <td>{{ $pool_party->start_time }}</td>
                        <td>{{ $pool_party->end_time }}</td>
                        <td>
                            <form action="/poolparties/{{ $pool_party->id }}" method="post">
                                @method('post')
                                @csrf
                                <div class="btn-group btn-group-lg">
                                    <a href="/poolparties/{{$pool_party->id}}" id="new_reservation" class="btn btn-outline-success btn-add" data-toggle="tooltip" title="Selecteer een zwemfeestje">
                                        <i class="far fa-calendar-check"></i>
                                    </a>
                                </div>
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


