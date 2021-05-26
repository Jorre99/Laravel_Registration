@extends('layouts.template')

@section('title', 'Customer aanmaken')

@section('main')
    <style>
        .dropdown-check-list {
            display: inline-block;
        }

        .dropdown-check-list .anchor {
            position: relative;
            cursor: pointer;
            display: inline-block;
            padding: 5px 50px 5px 10px;
            border: 1px solid #ccc;
        }

        .dropdown-check-list .anchor:after {
            position: absolute;
            content: "";
            border-left: 2px solid black;
            border-top: 2px solid black;
            padding: 5px;
            right: 10px;
            top: 20%;
            -moz-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        .dropdown-check-list .anchor:active:after {
            right: 8px;
            top: 21%;
        }

        .dropdown-check-list ul.items {
            padding: 2px;
            display: none;
            margin: 0;
            border: 1px solid #ccc;
            border-top: none;
        }

        .dropdown-check-list ul.items li {
            list-style: none;
        }

        .dropdown-check-list.visible .anchor {
            color: #0094ff;
        }

        .dropdown-check-list.visible .items {
            display: block;
        }
    </style>
    <h1>Zwemles aanvragen</h1>

    <div class="">
        <h4>Kies een tijdstip</h4>
        <form action="/customers" method="post">
            @method('post')
            @csrf
            <div class="form-group">

                <div id="list1" class="dropdown-check-list" tabindex="100">
                    <span class="anchor">Kies een tijdstip voor de zwemles</span>
                    <ul class="items">
                        @foreach($timeslots as $slot)
                            @if($slot->status_swimming_lesson == 1)
                                <li><input type="checkbox" name="lessons[]" value="{{$slot->id}}"/>
                                    {{$slot->weekday}}: {{$slot->start_time}} - {{$slot->end_time}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <br>
                <div class="row">
                    <div class="col-6">
                        <label for="first_name">Voornaam</label>
                        <input type="text" name="first_name" id="first_name"
                               class="form-control @error('first_name') is-invalid @enderror"
                               placeholder="Voornaam">
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="name" style="">Achternaam</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Achternaam"
                               minlength="3"
                               required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6"><label for="email" style="padding-top: 20px;">E-mailadress</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="email"
                               minlength="3"
                               required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6"><label for="telephone_nr" style="padding-top: 20px;">Telefoon</label>
                        <input type="text" name="telephone_nr" id="telephone_nr"
                               class="form-control @error('telephone_nr') is-invalid @enderror"
                               placeholder="Telefoon nummer"
                               minlength="3"
                               required>
                        @error('telephone_nr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3"><label for="street">Straat</label>
                        <input type="text" name="street" id="street"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="straat">
                        @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3"><label for="postal_code">Postcode</label>
                        <input type="text" name="postal_code" id="postal_code"
                               class="form-control @error('postal_code') is-invalid @enderror"
                               placeholder="Postcode">
                        @error('postal_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3"><label for="house_nr">huisnummer</label>
                        <input type="text" name="house_nr" id="house_nr"
                               class="form-control @error('house_nr') is-invalid @enderror"
                               placeholder="huisnummer">
                        @error('house_nr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3"><label for="box_nr">Bus</label>
                        <input type="box_nr" name="box_nr" id="box_nr"
                               class="form-control @error('box_nr') is-invalid @enderror"
                               placeholder="Bus"></div>
                    <div class="col-6"><label for="city">Stad</label>
                        <input type="text" name="city" id="city"
                               class="form-control @error('city') is-invalid @enderror"
                               placeholder="Stad">
                        @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6"><label for="birth_date">Geboortedatum</label>
                        <input type="date" name="birth_date" id="birth_date"
                               class="form-control @error('birth_date') is-invalid @enderror"
                               placeholder="jjjj-mm-dd">
                        @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12"><label for="note">Opmerking</label>
                        <input type="text" name="note" id="note"
                               class="form-control @error('note') is-invalid @enderror"
                               placeholder="Opmerking"></div>
                </div>

            </div>
            <button type="submit" class="btn btn-success">Verzenden</button>
        </form>
    </div>

    <script>
        var checkList = document.getElementById('list1');
        checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
            if (checkList.classList.contains('visible'))
                checkList.classList.remove('visible');
            else
                checkList.classList.add('visible');
        }

        Noty

    </script>
@endsection
