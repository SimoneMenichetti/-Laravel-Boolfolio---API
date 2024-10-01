<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('layouts.Guest')

    @section('content')
        <div class="container text-center mt-5">
            <h1>Benvenuto alla Pagina Guest</h1>
            <p class="lead">Puoi accedere o registrarti per usufruire delle funzionalità.</p>
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary mx-2">Log In</a>
                <a href="{{ route('register') }}" class="btn btn-success mx-2">Registrati</a>
            </div>
        </div>
    @endsection

</body>

</html>
