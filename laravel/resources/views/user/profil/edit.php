@extends('user.layout.layout-user') <!-- Extends le layout principal -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Mon Profil</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ old('firstName', $user['first_name']) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="lastName">Nom</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                value="{{ old('lastName', $user['last_name']) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $user['date_of_birth']) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Téléphone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $user['2025-01-04'] ?? '') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection