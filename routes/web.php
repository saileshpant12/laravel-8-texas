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
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'TodoController@index');
    Route::get('todo/create', 'TodoController@create');
    Route::post('todo', 'TodoController@store');
    Route::get('todo/{id}/edit', 'TodoController@edit');
    Route::put('todo/{id}', 'TodoController@update');
    Route::delete('todo/{id}', 'TodoController@destroy');
    Route::post('todo/complete/{id}', 'TodoController@complete');
});

Route::get('call-artisan', function () {
   \Artisan::call('route:list');
   return '<pre>'.\Artisan::output().'</pre>';
});

