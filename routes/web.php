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

Route::group(['prefix' => '/admin'], function () {
    Voyager::routes();
});

Route::get('/', 'HomeController@index')->name('home');

// Authentication
Route::get('/login', 'AuthController@getLogin')->name('login.show');
Route::post('/login', 'AuthController@postLogin')->name('login');
Route::get('/register', 'AuthController@getRegister')->name('register.show');
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

// order
Route::resource('order', 'OrderController');

// user
Route::resource('user', 'UserController');

// news routes
Route::group(['prefix' => '/news'], function () {
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('/{slug}', 'NewsController@show')->name('news.show');
});

Route::any('/search', 'NewsController@search')->name('news.query');

Route::get('/test', function () {
    return \App\User::all();
});

// custom route voyager
