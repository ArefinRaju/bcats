<?php

use Helper\Route\CombinedRoute;
use Illuminate\Support\Facades\Route;

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


Route::get('login', 'AuthController@loginPage')->name('login');

Route::post('/login', 'AuthController@login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get(
        '/',
        function () {
            return view('admin.dashboard');
        }
    );
});
Route::get(
    '/profile',
    function () {
        return view('admin.pages.profile.create');
    }
);
Route::get(
    '/my-transaction',
    function () {
        return view('admin.pages.profile.my_transaction');
    }
);
Route::get(
    '/my-payment',
    function () {
        return view('admin.pages.profile.my_payment');
    }
);
Route::get(
    '/my-emi',
    function () {
        return view('admin.pages.profile.my_emi');
    }
);
Route::get(
    '/my-due',
    function () {
        return view('admin.pages.profile.my_due');
    }
);
Route::get(
    '/balance-overview',
    function () {
        return view('admin.pages.building_accounts.balance_overview');
    }
);
Route::get(
    '/add-member-payments',
    function () {
        $payees = \App\Models\Payee::all();
        return view('admin.pages.building_accounts.add_member_payment',compact('payees'));
    }
);

Route::get(
    '/material/current-stock',
    function () {
        return view('admin.pages.material.current_stock');
    }
);
Route::get(
    '/material/used-stock',
    function () {
        return view('admin.pages.material.used_stock');
    }
);
Route::get(
    '/material/use-material',
    function () {
        return view('admin.pages.material.use_material');
    }
);
Route::get(
    '/material/required-material',
    function () {
        return view('admin.pages.material.required_material');
    }
);
Route::get('/payment/create', 'AccountController@payeePaymentForm');
Route::post('/debit', 'AccountController@payPayee');
Route::get(
    '/payment/list',
    function () {
        return view('admin.pages.payment.index');
    }
);

Route::get('/addFund', 'AccountController@addFundForm');
Route::post('/addFund', 'AccountController@addFund');

Route::get('/credit', 'AccountController@creditForm');
Route::post('/credit', 'AccountController@credit');
Route::get('/demand', 'AccountController@demandForm');
Route::post('/demand', 'AccountController@demand');

Route::get(
    '/emi/unpaid',
    function () {
        return view('admin.pages.emi.unpaid_emi');
    }
);
Route::get(
    '/emi/pay',
    function () {
        return view('admin.pages.emi.pay_emi');
    }
);
Route::get(
    '/form',
    function () {
        return view('admin.pages.blank.form');
    }
);
Route::get(
    '/table',
    function () {
        return view('admin.pages.blank.table');
    }
);

CombinedRoute::resourceRoute('/product', 'ProductController', []);

CombinedRoute::resourceRoute('user', 'UserController', []);
Route::get('/user-create',	'UserController@createForm');
Route::get('/user-edit/{id}',	'UserController@editForm');


CombinedRoute::resourceRoute('payee', 'PayeeController', []);
Route::get('/payee-create',	'PayeeController@createForm');
Route::get('/payee-edit/{id}',	'PayeeController@editForm');

CombinedRoute::resourceRoute('material', 'MaterialController', []);
Route::get('/material-create',	'MaterialController@createForm');
Route::get('/material-edit/{id}',	'MaterialController@editForm');


Route::get('/material-history-debit', 'MaterialHistoryController@debitForm');
Route::get('/material-history-credit', 'MaterialHistoryController@creditForm');
Route::get('/material-history-demand', 'MaterialHistoryController@demandForm');
Route::get('/material-history-stock', 'MaterialHistoryController@stockForm');
Route::post('/materialHistoryDebit', 'MaterialHistoryController@debit');
Route::post('/materialHistoryCredit', 'MaterialHistoryController@credit');
Route::post('/materialHistoryDemand', 'MaterialHistoryController@demand');


CombinedRoute::resourceRoute('emi', 'EMIController', []);
Route::get('/emi-create',	'EMIController@createForm');
CombinedRoute::resourceRoute('account', 'AccountController', []);
CombinedRoute::resourceRoute('project', 'ProjectController', []);
Route::get('/project-create',	'ProjectController@createForm');
Route::get('/project-edit/{id}',	'ProjectController@editForm');

// No need because material's resourceRoute has list with pagination
//Route::get('/materials/list',	'MaterialController@materialList');

//Route::get('/product',	'ProductController@retrieve');
