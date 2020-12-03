<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*
200 OK	Successful.
201 Created	Created.
400 Bad Request	Bad input parameter. Error message should indicate which one and why.
401 Unauthorized	The client passed in the invalid Auth token. Client should refresh the token and then try again.
403 Forbidden	* Customer doesn’t exist. * Application not registered. * Application try to access to properties not belong to an App. * Application try to trash/purge root node. * Application try to update contentProperties. * Operation is blocked (for third-party apps). * Customer account over quota.
404 Not Found	Resource not found.
405 Method Not Allowed	The resource doesn't support the specified HTTP verb.
409 Conflict	Conflict.
411 Length Required	The Content-Length header was not specified.
412 Precondition Failed	Precondition failed.
429 Too Many Requests	Too many request for rate limiting.
500 Internal Server Error	Servers are not working as expected. The request is probably valid but needs to be requested again later.
503 Service Unavailable	Service Unavailable.
*/

Route::post('/v1/register', \App\Http\Controllers\UserRegisterController::class);

Route::middleware([\App\Http\Middleware\AppKey::class])->group(function () {
    Route::get('/v1/user/{id}', [\App\Http\Controllers\UserControler::class, 'show']);

    Route::get('/v1/info', function () {
        return response()->json([
            'message' => 'hello'
        ], 200);
    });
});


//Route::post('/v1/login', function (Request $request) {
//    $email = $request->post('email', '');
//    $password = $request->post('password', '');
//sleep(2); // TODO: remove
//    if (empty($email) or empty($password)) {
//        return response()->json([
//            'message' => 'no credentials'
//        ], 400);
//    }
//
//    if ($email == 'admin@gmail.com' and $password == '123') {
//        return response()->json([
//            'token' => '54hwg34fegqeawfwfwe'
//        ], 200);
//    }
//
//    return response()->json([
//        'message' => 'wrong credentials'
//    ], 400);
//});
