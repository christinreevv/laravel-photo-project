<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма контактов</title>
</head>

<body>
    <form action="{{route('contact.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Введите имя">
        <input type="text" name="phone" placeholder="Введите телефон">
        <input type="submit" value="Введите">
    </form>
</body>

</html>
