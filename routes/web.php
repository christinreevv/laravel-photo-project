<?php

use App\Models\Post;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CountryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return "<h1>Hello</h1>";
// });

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
})->name('about');

Route::get('/home', [HomeController::class, 'index']);


Route::resource('photos', PhotoController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/world', [HomeController::class, 'worldExample'])->name('world');

Route::resource('users', UserController::class);

Route::get('/users/login', function () {
    return view('login');
})->name('login');

Route::get('/login', [UserController::class, 'loginform'])->name('loginform');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::fallback(function () {
    abort(404, "Жаль, но страница не найдена...");
});

Route::get('testpost', function () {
    // $post = new Post;
    // $post->title = 'Новая статья';
    // $post->content = 'Содержимое новой статьи';
    // $post->save();
    // return 'Запись добавлена';


    // Post::create(['title'=>'Интересная статья', 'content'=> 'Текст интересной статьи']);
    // return 'Запись добавлена';

    // $result = Post::find(1);
    // dd($result);

    // $result = Post::where('title', 'Интересная статья')->select('content')->get();
    // dd($result);

    // Post::find(1)->update(['title'=> 'Обновленный контент',
    //                        'updated_at'=>Now(),
    //                     ]);
    // return 'Запись Обновлена';

    // Post::find(1)->delete();
    // return 'Запись удалена';

    // Post::destroy([2,3]);
    // return 'Запись удалена';
});

Route::get('testcountry', function () {
    // $data = Country::all();
    // dd($data);

    //первые 5 записей из таблицы country
    // $data = Country::limit(value: 5)->get();
    // dd($data);

    // только такие страны (код страны и название страны), название которых начинается на букву А
    // $data = Country::select('Code', 'Name')->where('Name', 'like', 'A%')->get();
    // dd($data);

    // Для поиска записи по указанному значению первичного ключа используйте метод find(). Выведите объект класса Country (запись таблицы), по первичному ключу со значением ‘ARG’
    // $data = Country::find('ARG');
    // dd($data);
});

Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::post('/countries/search', [CountryController::class, 'search'])->name('countries.search');


Route::get('/countries/{countryCode}/cities', [CityController::class, 'getCitiesByCountry'])->name('countries.cities');

// Route::get('testpost/{id}', function ($id) {
//     $post = Post::find($id);
//     dump($post->title);

//     foreach($post->tags as $x){
//         dump($x->pivot->title);
//     }
// });


Route::get('/orders', [OrderController::class, 'index'])->name('index');

Route::get('/order/{order}', [OrderController::class, 'show'])->name('show');
Route::get('/addproduct', [OrderController::class, 'create'])->name('addproduct');

Route::get('/orders/{order}/add-product', [OrderController::class, 'edit'])->name('orders.addproduct');

// Route::get('/orders/{order}/add-product', [OrderController::class, 'update'])->name('orders.addproduct');

// Обработка данных из формы и добавление товара в заказ
Route::post('/orders/{order}/add-product', [OrderController::class, 'update'])->name('orders.storeproduct');
