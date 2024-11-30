<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>10 стран с самыми большими значениями индекса GNP</h2>
    <ul>
        @foreach ($topGnCountries as $country)
            <li>{{ $country->Name }}</li>
        @endforeach
    </ul>

    <h2>Страны в Африке (название и площадь)</h2>
    <ul>
        @foreach ($africanCountries as $country)
            <li>{{ $country->Name }} - {{ $country->SurfaceArea }} кв. км</li>
        @endforeach
    </ul>

    <h2>Страны, название которых начинается на букву S</h2>
    <ul>
        @foreach ($countriesStartingWithS as $country)
            <li>{{ $country->Name }} - {{ $country->Continent }}, {{ $country->Region }}</li>
        @endforeach
    </ul>

    <h2>Страны с площадью между 300,000 и 500,000</h2>
    <ul>
        @foreach ($countriesArea as $country)
            <li>{{ $country->Name }} - {{ $country->Continent }}, {{ $country->Region }}, {{ $country->SurfaceArea }} кв. км</li>
        @endforeach
    </ul>

    <h2>Страны с уменьшившимся индексом GNP</h2>
    <ul>
        @foreach ($decreasedGnCountries as $country)
            <li>{{ $country->Name }}</li>
        @endforeach
    </ul>

    <h2>Страны из Южной Америки и разность GNP и GNPOld</h2>
    <ul>
        @foreach ($southAmericaCountries as $country)
            <li>{{ $country->Name }} - Разность GNP/GNPOld: {{ $country->GNPDifference }}</li>
        @endforeach
    </ul>

    <h2>Для каждого региона выведите сумму населения стран этого региона</h2>
    @foreach ($populationByRegion as $region)
    <ul>
        <li>{{ $region->Region }}</li>
        <li>{{ number_format($region->TotalPopulation) }}</li>
    </ul>
    @endforeach

    <h2>Сумма населения стран по регионам</h2>
    <ul>
        @foreach ($populationByRegion as $region)
            <li>{{ $region->Region }} - {{ $region->TotalPopulation }}</li>
        @endforeach
    </ul>

    <h2>Количество городов, название которых начинается на букву U</h2>
    <p>Количество: {{ $citiesStartingWithU }}</p>

    <h2>Города на букву M и названия стран</h2>
    <ul>
        @foreach ($citiesAndCountries as $item)
            <li>{{ $item->CityName }} - {{ $item->CountryName }}</li>
        @endforeach
    </ul>

    <h2>Страны в Европе и количество городов в каждой</h2>
    <ul>
        @foreach ($europeancountryWithCityCount as $item)
            <li>{{ $item->CountryName }} - {{ $item->CityCount }} городов</li>
        @endforeach
    </ul>


    <h2>Страны Азии и их столицы</h2>
    <ul>
        @foreach ($asiancountryAndCapitals as $item)
            <li>{{ $item->CountryName }} - Столица: {{ $item->Capital }}</li>
        @endforeach
    </ul>

    <h2>Страны с количеством городов больше 50</h2>
    <ul>
        @foreach ($countryWithManycity as $country)
            <li>{{ $country->Name }}</li>
        @endforeach
    </ul>
</body>
</html>