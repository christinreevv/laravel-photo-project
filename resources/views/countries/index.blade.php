@extends('layouts.layout');

@section('title');
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-3">Search Countries</h1>

        <form class="d-flex p-2" action="{{ route('countries.search') }}" method="POST">
            @csrf
            <input class="col-9 px-3 py-1" type="text" name="query" placeholder="Enter the name of the country">
            <select class="col form-select mx-2" name="sort_by">
                <option value="name" {{ isset($sortBy) && $sortBy == 'name' ? 'selected' : '' }}>By country</option>
                <option value="continent" {{ isset($sortBy) && $sortBy == 'continent' ? 'selected' : '' }}>By continent</option>
                <option value="SurfaceArea" {{ isset($sortBy) && $sortBy == 'SurfaceArea' ? 'selected' : '' }}>By square</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Country</th>
                    <th scope="col">Continent</th>
                    <th scope="col">Square</th>
                    <th scope="col">Number of Cities</th> <!-- Новая колонка -->
                    <th scope="col">Town</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($countries as $country) { ?>
                <tr>
                    <td class="text-start">{{ $country->Name }}</th>
                    <td class="text-start">{{ $country->Continent }}</td>
                    <td class="text-start">{{ $country->SurfaceArea }}</td>
                    <td class="text-start">{{ $country->cities_count }}</td> <!-- Отображение количества городов -->
                    <td><a class="city-link btn btn-primary" href="{{ route('countries.cities', $country->Code ) }}">Show towns</a></td>
                <td>

                </td>
                </tr>
                <? } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
