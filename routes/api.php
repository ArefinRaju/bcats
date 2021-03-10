<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Helper\Route\CombinedRoute;

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

Route::post('/auth/login', 'AuthController@apiLogin');

//Route::get('/apitest', 'ProductController@retrieve');
CombinedRoute::resourceRoute('/apitest', 'ProductController', []);

Route::middleware(['apiAuth'])->group(function () {
    CombinedRoute::resourceRoute('/user', 'UserController', []);
    CombinedRoute::resourceRoute('/material', 'MaterialController', []);
    CombinedRoute::resourceRoute('/emi', 'EMIController', []);
    CombinedRoute::resourceRoute('/account', 'AccountController', []);

    Route::middleware(['employee'])->group(function () {
        //CombinedRoute::resourceRoute('/material', 'MaterialController', []);
    });
});
