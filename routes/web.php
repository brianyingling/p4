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

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});
// Route::get('/debug', function () {

//     $debug = [
//         'Environment' => App::environment(),
//         'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
//     ];

//     /*
//     The following commented out line will print your MySQL credentials.
//     Uncomment this line only if you're facing difficulties connecting to the
//     database and you need to confirm your credentials. When you're done
//     debugging, comment it back out so you don't accidentally leave it
//     running on your production server, making your credentials public.
//     */
//     #$debug['MySQL connection config'] = config('database.connections.mysql');

//     try {
//         $databases = DB::select('SHOW DATABASES;');
//         $debug['Database connection test'] = 'PASSED';
//         $debug['Databases'] = array_column($databases, 'Database');
//     } catch (Exception $e) {
//         $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
//     }

//     dump($debug);
// });
