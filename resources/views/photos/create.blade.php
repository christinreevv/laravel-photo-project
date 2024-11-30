{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>

<body>

    <form action="{{ route('photos.store') }}" method="post">
        @csrf
        <input type="text" name="title">
        <input type="text" name="description">
        <button type="submit">Создать</button>
    </form>

</body>

</html> --}}

@extends('layouts.layout')



@section('content')

    <div class="container mt-5">

        <h1>Добавь в альбом новую фотографию</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('photos.store') }}" method="post" class="mt-3 ms-5">
            @csrf

            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Название фотографии</label>
                <input type="text" name="title" class="form-control" id="exampleInputText1" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputText2" class="form-label">Описание фотографии</label>
                <input type="text"  name="description" class="form-control" id="exampleInputText2" value="{{ old('description') }}" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputText3" class="form-label">Путь к фотографии</label>
                <input type="text" name="path" class="form-control" id="exampleInputText3" value="{{ old('path') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Добавить фотографию</button>

        </form>

        {{-- <p class="mt-5">Перейдите на <a href="{{ route('home') }}">главную страницу</a></p> --}}

    </div>

    </div>

@endsection
