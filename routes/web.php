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
Route::get('/', 'Home\HomeController@index');
Route::get('/search', 'Search\SearchController@index');
Route::get('/movie/{id}', 'Movie\MovieController@show');
Route::get('/movie/{id}/threads/create', 'Thread\ThreadController@create');
Route::get('/threads/{id}', 'Thread\ThreadController@show');
Route::get('/threads/{id}/edit', 'Thread\ThreadController@edit');
Route::put('/threads/{id}', 'Thread\ThreadController@update');
Route::get('/threads/{id}/delete', 'Thread\ThreadController@delete');
Route::post('/threads', 'Thread\ThreadController@store');
Route::delete('/threads/{id}', 'Thread\ThreadController@destroy');
Auth::routes();
