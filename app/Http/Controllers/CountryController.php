<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    // Метод для отображения формы
    public function index()
    {
    //    $countries = Country::all();
        // return view('countries.index' , compact('countries'));

        $countries = Country::withCount('cities')->get();

        return view('countries.index', compact('countries'));
    }

    // Метод для поиска стран
    public function search(Request $request)
{
    // Получаем параметры запроса с значениями по умолчанию
    $query = $request->input('query', '');
    $sortBy = in_array($request->input('sort_by'), ['name', 'continent', 'SurfaceArea']) ? $request->input('sort_by') : 'name';
    $order = $sortBy === 'SurfaceArea' ? 'desc' : ($request->input('order') === 'desc' ? 'desc' : 'asc');

    // Выполняем запрос к базе данных с фильтром и сортировкой
    $countries = Country::where('name', 'LIKE', "{$query}%")
        ->orderBy($sortBy, $order)
        ->get();

    // Возвращаем представление с результатами
    return view('countries.index', compact('countries', 'query', 'sortBy', 'order'));
}
}
