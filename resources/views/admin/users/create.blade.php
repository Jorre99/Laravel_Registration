@extends('layouts.template')

@section('title', 'Edit user')

@section('main')
    <h4>Maak een nieuwe gebruiker aan</h4>
    <form action="/admin/users" method="post">
        @method('post')
        @csrf
        <div class="form-group">

            <div class="row">
                <div class="col-6">
                    <label for="name">Naam</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                <label for="sur_name">Achternaam</label>
                <input type="text" name="sur_name" id="sur_name"
                       class="form-control @error('sur_name') is-invalid @enderror"
                       placeholder="Achternaam"
                       minlength="3"
                       required>
                @error('sur_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="email" style="padding-top: 20px;">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Email"
                       minlength="3"
                       required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <label for="telephone" style="padding-top: 20px;">Telefoon</label>
                <input type="text" name="telephone" id="telephone"
                       class="form-control @error('telephone') is-invalid @enderror"
                       placeholder="Telefoon nummer"
                       minlength="3"
                       required>
                @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-6">
                <div class="row" style="padding-top: 20px;">
                    <div class="col">
                        <input type="checkbox" id="is_contactpersoon" name="is_contactpersoon" value='1'>
                        <label for="is_contactpersoon">is contactpersoon</label><br>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="admin" name="admin" value='1'>
                        <label for="admin">Admin</label><br>
                    </div>
                </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-success">Gebruiker opslaan</button>
    </form>
@endsection

