<?php

use Illuminate\Database\Eloquent\Collection;
use App\Agent;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('home', function() {
    return redirect()->action('EventController@index');
});

Route::resource('events', 'EventController');
Route::post('events/{id}', 'EventController@link_agent');

Route::resource('agents', 'AgentController');

Route::get('logs', function() {
    return redirect()->action('EntryController@index', 1);
});
Route::get('logs/{page}', 'EntryController@index');
Route::delete('events/{id}', 'EntryController@delete');

Route::get('export', function() {
    $events = App\Event::all();
    $agents = App\Agent::all();
    $entries = DB::select('select * from agent_event');
    $lessons = App\Lesson::all();
    $courses = App\Course::all();
    return compact('events', 'agents', 'entries', 'lessons', 'courses');
});