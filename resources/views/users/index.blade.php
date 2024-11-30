<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    {{-- <nav>
        <ul>
            <li><a href="{{ route('users.index') }}">Пользователи</a></li>
            <li><a href="{{ route('users.create') }}">Регистрация</a></li> <!-- Ссылка на форму регистрации -->
        </ul>
    </nav> --}}

    <nav>
        <ul>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="{{ route('users.create') }}">Registration</a></li>
            {{-- <li><a href="{{ route('login') }}">Вход</a></li> --}}
        </ul>
    </nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
