<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('countries.index', compact('countries'));
   
    }

    public function getCitiesByCountry($countryCode)
    {

        $country = Country::find($countryCode);
        // Получаем информацию о стране для отображения
        $cities = Country::find($countryCode)->cities;

        // Возвращаем представление с городами этой страны
        return view('countries.cities', compact('cities', 'country'));
    }
}
