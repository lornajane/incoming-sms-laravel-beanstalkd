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
    return view('welcome');
});

Route::get('/sms', function () {
    $nexmo = app('Nexmo\Client');

    $nexmo->message()->send([
        'to'   => '447846810475',
        'from' => 'laravel',
        'text' => 'Using Laravel to send a better message.'
    ]);

    return "OK, OK :)";
});

