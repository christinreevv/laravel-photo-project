<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать фотографию</title>
</head>
<body>
    <h1>Редактировать фотографию</h1>

    <form action="{{ route('photos.update', ['photo' => $photo->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Название:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $photo->title) }}" required>
        <br>

        <label for="description">Описание:</label>
        <textarea id="description" name="description">{{ old('description', $photo->description ?? '') }}</textarea>
        <br>

        <button type="submit">Обновить</button>
    </form>

    <a href="{{ route('photos.index') }}">Назад к списку фотографий</a>
</body>
</html>
