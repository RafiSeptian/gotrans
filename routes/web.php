<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Category;

Route::get('/', 'HomeController@index')->name('home');

// Authentication
Route::get('/login', 'AuthController@getLogin')->name('login.show');
Route::post('/login', 'AuthController@postLogin')->name('login');
Route::get('/register', 'AuthController@getRegister')->name('register.show');
Route::post('/register', 'AuthController@postRegister')->name('register');
Route::post('/logout', 'AuthController@logout')->name('logout');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/news', function () {
//     return view('pages.news');
// })->name('news');
Route::get('/detail', function () {
    return view('pages.detail_news');
})->name('detail');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

Route::post('/request', 'RequestController@store')->name('request.store');

// order
Route::resource('order', 'OrderController');

// user
Route::resource('user', 'UserController');

// notif
Route::resource('notif', 'NotifController');

// news routes
Route::group(['prefix' => '/news'], function () {
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('/{slug}', 'NewsController@show')->name('news.show');
    Route::get('/{slug}', 'NewsController@show')->name('news.show');
    Route::get('/comment/{id}', 'NewsController@getComment')->name('comment.get');
    Route::post('/comment', 'NewsController@postComment')->name('comment.post');
});

// category
Route::get('/kategori/{name}', 'CategoryController@show')->name('category.show');

Route::any('/search', 'NewsController@search')->name('news.query');

// profile menu
Route::group(['prefix' => '/users'], function () {
    Route::get('/{username}', 'UserController@profile')->name('user.profile');
});
Route::get('/history', 'UserController@history')->name('history');
Route::get('/history/download', 'UserController@getHistory')->name('history.get');
Route::get('/driver', 'UserController@getChangeRole')->name('driver.get');
Route::post('/driver', 'UserController@postChangeRole')->name('driver.post');
Route::get('/setting', 'UserController@setting')->name('user.setting');

// group setting
Route::group(['prefix' => '/setting'], function () {
    Route::put('/{id}/update', 'ServicesController@update')->name('services.update');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('test', function () {
    $cate = Category::with(['news'])->where('name', 'transportasi')->first();

    foreach ($cate->news as $key) {
        echo $key->images;
    }
});
