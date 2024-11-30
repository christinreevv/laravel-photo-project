@extends('layouts.layout')

@section('title')
    @parent {{ $title }}
@endsection



@section('basic_header')
    @parent
    {{-- <p>Особенная часть шапки сайа тольео для страницы home</p> --}}
@endsection




@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Photos in the CB</h1>
                <p class="lead text-muted">The aesthetics of CB photos are collected in one place</p>
                <p>
                    <a href="{{ route('photos.create') }}" class="btn btn-primary my-2">Add your own</a>
                    <a href="{{ route('photos.index') }}" class="btn btn-primary my-2">Look at the photo</a>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($allPhotos as $photo)
                    <div class="col">
                        <div class="card shadow-sm">

                            <img src="{{ $photo->path }}" target="_blank" class="bd-placeholder-img card-img-top"
                                width="100%" height="225" xmlns="" role="img">

                            <title>Placeholder</title>

                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em"></text>

                            <div class="card-body">
                                <h5 class="card-text">{{ $photo->title }}</h5>
                                <p class="card-text">{{ $photo->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ $photo->path }}" target="_blank"
                                            class="btn btn-sm btn-outline-secondary">Check</a>
                                        <a href="{{ route('photos.edit', ['photo' => $photo->id]) }}"type="button"
                                            class="btn btn-sm btn-outline-secondary">Change</a>
                                    </div>
                                    <small class="text-muted">{{ $photo->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
@endsection
