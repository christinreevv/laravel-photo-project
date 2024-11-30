@extends('layouts.layout');

@section('title');
@endsection

@section('content')
    <div class="container mt-5">

        <h1>Список фотографий</h1>

        <ol class="list-group list-group-numbered">

            @foreach ($photos as $photo)
                <li class="list-group-item d-flex justify-content-between align-items-start">

                    <div class="ms-2 me-auto">
                        <div class="fw-bold"> <a
                                href="{{ route('photos.show', ['photo' => $photo->id]) }}">{{ $photo->title }}</a>
                        </div>
                        <a href="{{ route('photos.edit', ['photo' => $photo->id]) }}">Change</a>
                    </div>

                    <span class="badge bg-primary rounded-pill">

                        <form action="{{ route('photos.destroy', ['photo' => $photo->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>

                        </form>

                    </span>

                </li>
            @endforeach

        </ol>

        <a href="{{ route('photos.create') }}" class="btn btn-primary my-2 mt-5">Добавить новую фотографию</a>

        {{-- <p>Перейдите на <a href="{{ route('home') }}">главную страницу</a></p> --}}

    </div>
@endsection
