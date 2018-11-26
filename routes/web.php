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

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::get('/search-bunny', function () {
    return view('bunnyshelter.searchbunny');
});

Route::get('/research-bunny-process', 'ResearchController@searchBunny');


/*@if ($maleOrFemale == 'buck')
                <option value='buck' selected>Buck</option>
                <option value='doe'>Doe</option>
                <option value='both'>Both are fine</option>
@elseif ($maleOrFemale == 'doe')
<option value='buck'>Buck</option>
                <option value='doe' selected>Doe</option>
                <option value='both'>Both are fine</option>
@else
                <option value='buck'>Buck</option>
                <option value='doe'>Doe</option>
                <option value='both' selected>Either is fine</option>
@endif*/