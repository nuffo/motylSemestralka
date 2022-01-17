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
        <h2 class="text-center mb-5">Prihlásenie</h2>
        <form method="post" action="{{ route("login.store") }}">
        @csrf
            <div class="form-group mb-4">
                <label for="username">Prihlasovacie meno</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group  mb-4">
                <label for="heslo">Heslo</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="heslo" name="password">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Prihlásiť</button>
            <div class="register d-flex justify-content-center">
                <span><strong>Nemáš účet?</strong></span>
                <a href="{{ route("registerpage") }}">Registrovať</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ mix("js/app.js") }}"></script>
</body>
</html>
