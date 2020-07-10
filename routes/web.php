<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/buscar', function () {
    return view('buscar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::resource('contact', 'ContactoController');
Route::get("/encontrado/{search}", "SocialController@search");

Route::get('home/searchredirect', function(){
    if (empty(Request::get('search'))) return redirect()->back();
    $search = urlencode(e(Request::get('search')));
    $route = "encontrado/$search";
    return redirect($route);
});