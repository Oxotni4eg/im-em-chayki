<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CalenderController;


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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/page/istoriya', function () {
    return view('page/istoriya');
});

Route::get('/page/job', function () {
    return view('page/job');
});

Route::get('/page/pravila_i_zakony', function () {
    return view('page/pravila_i_zakony');
});

Route::get('/page/smeny', function () {
    return view('page/smeny');
});

Route::get('/page/rabota-s-roditelyami', function () {
    return view('page/rabota-s-roditelyami');
});

Route::get('/page/nasha-deyatelnost', function () {
    return view('page/nasha-deyatelnost');
});

Route::get('/page/contacts', function () {
    return view('page/contacts');
});

Route::get('/page/feedback', function () {
    return view('page/feedback');
});

Route::post('/sendmail', [App\Http\Controllers\Ajax\ContactController::class, 'send'])->name('send');

Route::get('/blog', function () {
    return redirect('http://im-em-chayki.localhost/en/blog');
});

//Роуты для галлереи

Route::get('/gallery', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create')->middleware('auth');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::post('/albums/store', 'AlbumsController@store')->middleware('auth');
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'))->middleware('auth');

Route::get('/photos/create/{id}', 'PhotosController@create');
Route::post('/photos/store', 'PhotosController@store')->middleware('auth');
Route::get('/photos/{id}', 'PhotosController@show');
Route::delete('/photos/{id}', 'PhotosController@destroy')->middleware('auth');

//Не получилось реализовать только для админа
/*if (Auth::user()->email = "vlad.szma@gmail.com") {

}*/


//Роуты для календаря

Route::get('full-calender', [App\Http\Controllers\FullCalenderController::class, 'index']);

Route::post('full-calender/action', [App\Http\Controllers\FullCalenderController::class, 'action']);
