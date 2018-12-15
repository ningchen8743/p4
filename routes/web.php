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

Route::get('/', function () {
    return view('bunnyshelter.welcome');
});

Route::view('/about', 'bunnyshelter.about');
Route::get('/all', 'BunnyController@index');
Route::view('/contact', 'bunnyshelter.contact');


Route::get('/search-bunny', 'SearchController@initializeView');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/search-bunny-process','SearchController@searchBunny');

    Route::get('/all/{id}','BunnyController@showeach');

    Route::get('/donate','BunnyController@initializeView');
    Route::post('/donate','BunnyController@store');

    Route::get('/all/{id}/edit','BunnyController@edit');
    Route::put('/all/{id}','BunnyController@update');


    Route::get('/all/{id}/delete','BunnyController@delete');
    Route::delete('/all/{id}','BunnyController@destroy');
});


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

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
