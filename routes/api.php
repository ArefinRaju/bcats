<?php

use Helper\Route\CombinedRoute;
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

Route::middleware('auth:api')->get('/user',
    function (Request $request) {
        return $request->user();
    });

Route::post('/auth/login', 'AuthController@apiLogin');

//Route::get('/apitest', 'ProductController@retrieve');
CombinedRoute::resourceRoute('/apitest', 'ProductController', []);
Route::get('/material/category/{id}', 'MaterialController@listByCategoryId');

Route::middleware(['apiAuth'])->group(function () {
    CombinedRoute::resourceRoute('/user', 'UserController', []);
    Route::post('/debit', 'AccountController@payPayee');
    Route::post('/addFund', 'AccountController@addFund');
    Route::post('/credit', 'AccountController@credit');
    Route::post('/upload', 'AccountController@upload');
    Route::post('/demand', 'AccountController@demand');
    Route::get('/transaction/{payee_id}', 'AccountController@transactionList');
    CombinedRoute::resourceRoute('/category', 'CategoryController', []);
    CombinedRoute::resourceRoute('/material', 'MaterialController', []);
    Route::post('/materialHistoryDebit', 'MaterialHistoryController@debit');
    Route::post('/materialHistoryCredit', 'MaterialHistoryController@credit');
    Route::post('/materialHistoryDemand', 'MaterialHistoryController@demand');
    Route::get('/stock', 'MaterialHistoryController@stock');
    CombinedRoute::resourceRoute('/materialHistory', 'MaterialHistoryController', []);
    Route::post('/unpaidEMIs', 'EMIController@unpaidEMIs');
    CombinedRoute::resourceRoute('/emi', 'EMIController', []);
    CombinedRoute::resourceRoute('/account', 'AccountController', []);
    Route::get('/supplier/{id}', 'PayeeController@viewSupplier');
    Route::get('/payeeConstants', 'PayeeController@constants');
    CombinedRoute::resourceRoute('/payee', 'PayeeController', []);

    Route::get('/invoice/{payee_id}', 'InvoiceController@listByPayee');
    Route::middleware(['employee'])->group(function () {
        //CombinedRoute::resourceRoute('/material', 'MaterialController', []);
    });
});
