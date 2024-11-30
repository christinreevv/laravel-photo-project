<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Добавьте вызов метода insert  для добавления записи:
        // DB::insert('insert into catalog_photo(name, created_at,
        // updated_at) values (?, ?, ?)', ['Pig', Now(), Now()]);

        // В привязках можно использовать именованные заполнители, добавьте еще одну запись (вместо знаков ? используйте имена и ассоциативный массив значений:
        // DB::insert('insert into catalog_photo (name, created_at) values (:name, :create)',
        // ['name' => 'Hamster', 'create' => Now()]);

        //вернет только те записи, у которых id > 2.
        // $photos = DB::select('select * from catalog_photo where id > :myId', ['myId' => 2] );

        //Метод update обновляет данные (и возвращает количество обновленных  данных, затронутых запросом).
        // DB::update('update catalog_photo set name = ? where id = ?', ['Flowers', 3]);

        // задание 1 Удалите записи, у которых name = ‘Kitty’  и выведите количество удаленных записей в браузер
        // DB::insert('insert into catalog_photo(name, created_at,
        // updated_at) values (?, ?, ?)', ['Kitty', Now(), Now()]);
        // DB::delete('delete from catalog_photo where name = ?', ['Kitty']);

        // задание 2 переименуйте таблицу catalog_photo, дайте таблице имя photos (RENAME TABLE example.catalog_photo TO example.photos;)
        // DB::statement('RENAME TABLE `example`.catalog_photo TO `example`.photos');

        // задание 2.1 добавьте столбец description - описание фотографии
        // DB::statement('ALTER TABLE example.photos ADD COLUMN descriptions VARCHAR(255)');

        // $photos = DB::select('select * from photos');
        // return $photos;

        // пример 1. выбрать всех клиентов
        // $customers = DB::table('customers')->get();
        // $number = $customers->count();

        // пример 2.  выбрать первого клиента
        // $one_customer = DB::table('customers')->first();

        // // пример 3. выбрать товары с ценой больше чем 4
        // $name_by_price = DB::table('products')->get();
        // $price = DB::table('products')->where('prod_price', '>', 4)->get();

        // пример 4. соединение таблиц. выбрать столбцы
        // название поставщика, название товара, цена товара
        // $selection = DB::table('vendors')
        //                 ->join('products', 'vendors.vend_id', '=', 'products.vend_id')
        //                 ->select('vend_name', 'prod_name', 'prod_price')
        //                 ->get();

        // return view('home', ['customs' => $customers,
        //                     'cust_num' => $number,
        //                     'one_customer' => $one_customer,
        //                     'prod_name' => $name_by_price,
        //                     'prod_price' => $price,
        //                     'selection'=>$selection,
        //                 ]);
        $allPhotos = DB::select('select * from photos order by created_at desc');
        return view('home', ['title'=>"Домашняя страница", 'allPhotos' => $allPhotos]);
    }

    public function worldExample()
    {
         // 1. Название 10 стран с самыми большими значениями индекса GNP
         $topGnCountries = DB::table('country')
         ->select('Name')
         ->orderBy('GNP', 'desc')
         ->limit(10)
         ->get();

         $africanCountries = DB::table('country')
         ->select('Name', 'SurfaceArea')
         ->where('Region', 'LIKE', '%Africa%')
         ->get();

     // 3. Информация о странах, название которых начинается на букву S
     $countriesStartingWithS = DB::table('country')
         ->select('Name', 'Continent', 'Region')
         ->where('Name', 'LIKE', 'S%')
         ->get();

     // 4. Информация о странах с площадью между 300,000 и 500,000
     $countriesArea = DB::table('country')
         ->select('Name', 'Continent', 'Region', 'SurfaceArea')
         ->where('SurfaceArea', '>', 300000)
         ->where('SurfaceArea', '<', 500000)
         ->get();

     // 5. Название стран, у которых уменьшился индекс GNP
     $decreasedGnCountries = DB::table('country')
         ->select('Name')
         ->whereNotNull('GNP')
         ->whereNotNull('GNPOld')
         ->where('GNP', '<', 'GNPOld')
         ->get();

     // 6. Страны из Южной Америки и разность GNP и GNPOld
     $southAmericaCountries = DB::table('country')
         ->select('Name', DB::raw('GNP - GNPOld as GNPDifference'))
         ->where('Region', 'South America')
         ->whereNotNull('GNP')
         ->whereNotNull('GNPOld')
         ->get();

     // 7. Сумма населения стран по регионам
     $populationByRegion = DB::table('country')
         ->select('Region', DB::raw('SUM(Population) as TotalPopulation'))
         ->groupBy('Region')
         ->get();

     // 8. Количество городов, название которых начинается на букву U
     $citiesStartingWithU = DB::table('city')
         ->where('Name', 'LIKE', 'U%')
         ->count();

     // 9. Все города на букву M и названия стран
     $citiesAndCountries = DB::table('city')
         ->join('country', 'city.CountryCode', '=', 'country.Code')
         ->select('city.Name as CityName', 'country.Name as CountryName')
         ->where('city.Name', 'LIKE', 'M%')
         ->get();

     // 10. Названия стран в Европе и количество городов в каждой из стран
     $europeancountryWithCityCount = DB::table('country')
        ->leftJoin('city', 'country.Code', '=', 'city.CountryCode')
        ->select('country.Name as CountryName', DB::raw('COUNT(city.ID) as CityCount'))
        ->where('country.Region', 'LIKE', '%Europe%')
        ->groupBy('country.Name')
        ->get();


        // 11. Названия стран Азии и их столицы
        $asiancountryAndCapitals = DB::table('country')
            ->select('country.Name as CountryName', 'city.Name as Capital')
            ->join('city', 'country.Capital', '=', 'city.ID')
            ->where('country.Region',  'LIKE', '%Asia%')
            ->get();

        // 12. Страны с количеством городов больше 50
        $countryWithManycity = DB::table('country')
            ->join('city', 'country.Code', '=', 'city.CountryCode')
            ->select('country.Name')
            ->groupBy('country.Name')
            ->havingRaw('COUNT(city.ID) > 50')
        ->get();

        $populationByRegion = DB::table('country')
    ->select('Region', DB::raw('SUM(Population) as TotalPopulation'))
    ->groupBy('Region')
    ->get();


    return view('world.example', compact(
        'topGnCountries',
        'africanCountries',
        'countriesStartingWithS',
        'countriesArea',
        'decreasedGnCountries',
        'southAmericaCountries',
        'populationByRegion',
        'citiesStartingWithU',
        'citiesAndCountries',
        'europeancountryWithCityCount',
        'asiancountryAndCapitals',
        'countryWithManycity',
        'populationByRegion'
    ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
