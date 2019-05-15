<?php

use Illuminate\Http\Request;
use App\Jobs\InboundSms;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('inbound-sms', function(Request $request)
{
    // get incoming parameters (includes GET and POST)
    $params = $request->input();
    $data = ["event" => "message", "text" => $params['text'],
        "receivedAt" => date("U"), "payload" => $params];
    error_log("New message: " . $params['text']);

    InboundSms::dispatch($data);

    return "OK";
});

