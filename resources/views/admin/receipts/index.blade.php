@extends('layouts.template')

@section('main')
    <style>
        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>

    @foreach($school_receipts as $receipt)
        @if($loop->first)
            <h1>Facturen van {{$receipt->school->name}}</h1>
        @endif
    @endforeach
    <table class="table">
        <thead>
        <tr>
            <th>Factuurnummer</th>
            <th>Verantwoorderlijke</th>
            <th>Datum</th>
            <th>Gesubsidieerd</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($school_receipts as $receipt)
            <tr>
                <td>{{ $receipt->id }}</td>
                <td>{{ $receipt->user->name }}</td>
                <td>{{ $receipt->date }}</td>
                <td>
                    @if($receipt->is_subsidized == 1)
                        <i class="fas fa-check"></i>
                    @endif
                        @if($receipt->is_subsidized == 0)
                            <i class="fas fa-times"></i>
                        @endif

                </td>
                <td>
                    <form action="/admin/invoice/{{$receipt->id}}/send" method="post">
                        @method('post')
                        @csrf
                        <div class="btn-group">
                            <a href="/admin/invoice/{{$receipt->id}}/show" target="_blank"
                               class="btn btn-outline-success"
                               data-toggle="tooltip"
                               title="Factuur downloaden">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="/admin/invoice/{{$receipt->id}}/send" class="btn btn-outline-success"
                               data-toggle="tooltip"
                               title="Factuur mailen naar {{$receipt->school->email}}">
                                <i class="fas fa-envelope-square"></i>
                            </a>
                        </div>
                    </form>
                </td>
                <td>
                    <button class="btn-outline-primary dropdown-toggle collapsible" type="button"><i
                            class="fas fa-plus-square"></i>
                    </button>
                    <div class="content">
                        <table>
                            <thead>
                            <tr>
                                <th>datum</th>
                                <th>klas</th>
                                <th>aantal leerlingen</th>
                                <th>totale prijs</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receipt->pool_appointments as $app)
                                <tr>
                                    <td>{{$app->date}}</td>
                                    <td>{{$app->school_class->class_name}}</td>
                                    <td>{{$app->pupil_count}}</td>
                                    @foreach($prices as $price)
                                        <td>{{$price->price * $app->pupil_count}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

@endsection

