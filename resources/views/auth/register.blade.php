<!DOCTYPE html>
<html lang="en">
<head>
    <title>MotylPub</title>
    <script src="https://kit.fontawesome.com/d43e81f58b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include("includes.menu")
<div class="container">
    <div class="loginform">
        <h2 class="text-center mb-5">Registrácia</h2>
        <form method="post" action="{{ route("register.store") }}">
        @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="firstname">Meno</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}">
                    @error('firstname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="lastname">Priezvisko</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="username">Prihlasovacie meno</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Emailová adresa</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <label for="password">Heslo</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group  mb-3">
                <label for="confirmPassword">Potvrdiť heslo</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword" name="password_confirmation">
                @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Registrovať</button>
            <div class="text-center">
                <a href="{{ route("loginpage") }}">späť na prihlásenie</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ mix("js/app.js") }}"></script>
</body>
</html>
