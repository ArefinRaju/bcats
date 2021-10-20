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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::post('/auth/login', 'AuthController@apiLogin');

//Route::get('/apitest', 'ProductController@retrieve');
CombinedRoute::resourceRoute('/apitest', 'ProductController', []);
Route::get('/material/category/{id}', 'MaterialController@listByCategoryId');
Route::post('/supplierSearch', 'PayeeController@search');
Route::post('/memberSearch', 'UserController@search');

Route::middleware(['apiAuth'])->group(function () {
    CombinedRoute::resourceRoute('project', 'ProjectController', []);
    Route::get('/member/{memberId}', 'UserController@memberDetails');
    Route::get('/userType/{userType}', 'UserController@showByUserType');
    Route::get('/user/constants', 'UserController@constants');
    Route::get('/userStatus/{userID}', 'UserController@updateUserStatus');
    CombinedRoute::resourceRoute('/user', 'UserController', []);
    CombinedRoute::resourceRoute('/category', 'CategoryController', []);
    Route::get('/material/constants', 'MaterialController@constants');
    CombinedRoute::resourceRoute('/material', 'MaterialController', []);
    Route::post('/materialHistoryDebit', 'MaterialHistoryController@debit');
    Route::post('/materialHistoryCredit', 'MaterialHistoryController@credit');
    Route::post('/materialHistoryDemand', 'MaterialHistoryController@demand');
    Route::get('/stock', 'MaterialHistoryController@stock');
    Route::get('/materialDebitList', 'MaterialHistoryController@debitList');
    Route::get('/materialCreditList', 'MaterialHistoryController@creditList');
    CombinedRoute::resourceRoute('/materialHistory', 'MaterialHistoryController', []);
    Route::post('/unpaidEMIs', 'EMIController@unpaidEMIs');
    Route::get('/emiList', 'EMIController@emiList');
    Route::get('/otpList', 'EMIController@otpList');
    CombinedRoute::resourceRoute('/emi', 'EMIController', []);
    Route::post('/debit', 'AccountController@payPayee');
    Route::post('/payEmployee', 'AccountController@payEmployee');
    Route::post('/addFund', 'AccountController@addFund');
    Route::post('/credit', 'AccountController@credit');
    Route::post('/upload', 'AccountController@upload');
    Route::post('/demand', 'AccountController@demand');
    Route::get('/transaction/{payee_id}', 'AccountController@transactionList');
    Route::get('/employeePaymentList', 'AccountController@employeePaymentList');
    Route::get('/memberTransactions/{userId}', 'AccountController@userTransactionList');
    Route::get('/debitList', 'AccountController@debitList');
    CombinedRoute::resourceRoute('/account', 'AccountController', []);
    Route::get('/supplier/{id}', 'PayeeController@viewSupplier');
    Route::get('/payeeConstants', 'PayeeController@constants');
    Route::get('/supplierList/{type}', 'PayeeController@listByType');
    Route::get('/payee/{payeeID}', 'payeeController@updatepayeeStatus');
    Route::get('supplierTransactions/', 'AccountController@supplierTransactionList');
    Route::get('supplierTransactions/{supplierId}', 'AccountController@supplierTransactionListBySupplierId');
    CombinedRoute::resourceRoute('/payee', 'PayeeController', []);
    Route::get('/invoice/{payee_id}', 'InvoiceController@listByPayee');
});

//Route::get('/test', 'InvoiceController@test');

Route::middleware(['employee'])->group(function () {
    Route::get('/test', 'InvoiceController@test');
});
