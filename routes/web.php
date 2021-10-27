<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page/istoriya', function () {
    return view('page/istoriya');
});

Route::get('/page/feedback', function () {
    return view('page/feedback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/sendmail', [App\Http\Controllers\Ajax\ContactController::class, 'send'])->name('send');

Route::get('/blog', function () {
    return redirect('http://im-em-chayki.localhost/en/blog');
});
