@extends('layout')

@section('content')
<div class="container">
    <h1>Successful registration</h1>
    <p>Congratulate, {{ $user->name }}! You have successfully registered.</p>
    <p><a href="{{ route('home') }}">Go to home page</a></p>
</div>
@endsection
