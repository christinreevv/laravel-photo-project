<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Города</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Города в {{ $country->Name }}</h1>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Город</th>
                    <th scope="col">Район</th>
                    <th scope="col">Население</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($cities as $city) { ?>
                <tr>
                    <td class="text-start">{{ $city->Name }}</th>
                    <td class="text-start">{{ $city->District }}</td>
                    <td class="text-start">{{ $city->Population }}</td>
                <td>
                    
                </td>
                </tr>
                <? } ?>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="{{ route('countries.index') }}">Назад к странам</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
