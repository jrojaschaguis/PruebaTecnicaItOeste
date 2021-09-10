<?php

//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Functions;

/*
|--------------------------------------------------------------------------
| Web Routes Pages
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('cms-home');
Route::get('/cuenta_visitas', 'HomeController@getStatisticsCuentaVisitas')->name('cms-cuentavisitas');
Route::get('/cuenta_click', 'HomeController@getStatisticsCuentaClick')->name('cms-cuentaclick');
