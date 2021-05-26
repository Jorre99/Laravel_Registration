@extends('layouts.template')

@section('title', 'Edit user')

@section('main')
    <h4>De gebruiker: {{ $user->name }} aanpassen</h4>
    <form action="/admin/users/{{ $user->id }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="name">Naam</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Name"
                           value="{{ old('name', $user->name) }}">
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
                           required
                           value="{{ old('sur_name', $user->sur_name )}}">
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
                           required
                           value="{{ old('email', $user->email) }}">
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
                           required
                           value="{{ old('telephone', $user->telephone) }}">
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="row" style="padding-top: 20px;">
                        <div class="col">
                            <input type="checkbox" id="is_contactpersoon" name="is_contactpersoon"
                                   value='1' {{ old('is_contactpersoon', $user->is_contactpersoon)? 'checked="checked"':null }}>
                            <label for="is_contactpersoon">is contactpersoon</label><br>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="admin" name="admin"
                                   value='1' {{ old('admin', $user->admin)? 'checked="checked"':null }}>
                            <label for="admin">Admin</label><br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success">Gegevens opslaan</button>
    </form>
@endsection

