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




Route::post('/login', 'AuthController@login');

Route::middleware(['guest'])->group(function () {
    Route::get('/homes', function () {
        return view('welcome');
    });
    Route::get('login', 'AuthController@loginPage')->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/', 'AuthController@dashBoard');
});

Route::get('/supplier/{id}', 'PayeeController@viewSupplier');
Route::get('/member/{memberId}', 'UserController@memberDetails');
Route::get('/member', 'PayeeController@member');
Route::get('fetch-sub-category-product-info/{id}', 'PayeeController@fetchSubCategory');
Route::get('/memberSearch', 'PayeeController@memberSearch');
Route::get('/supplier-search', 'PayeeController@supplierSearch');
Route::get('/supplierlist/{type}', 'PayeeController@listByType');
Route::get('/userType/{userType}', 'UserController@showByUserType');
Route::get('/transaction/{payee_id}', 'AccountController@transactionList');
Route::get('membertransactions/', 'AccountController@memberTransactionList');
Route::get('suppliertransactions/', 'AccountController@supplierTransactionList');
Route::get('/invoice/{payee_id}', 'InvoiceController@listByPayee');
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
    '/pay',
    function () {
        $payees = \App\Models\Payee::all();
        return view('admin.pages.building_accounts.add_member_payment', compact('payees'));
    }
);

Route::post('/payPayee', 'AccountController@payPayee');
Route::post('/stock', 'MaterialHistoryController@stock');
Route::post('/material/current-stock', 'MaterialHistoryController@stock');

/*Route::get(
    '/material/current-stock',
    function () {
        return view('admin.pages.material.current_stock');
    }
);*/
Route::get(
    '/material/used-stock',
    function () {
        return view('admin.pages.material.used_stock');
    }
);
Route::get('/material/use-material', 'MaterialHistoryController@usedMaterials');
Route::get(
    '/material/required-material',
    function () {
        return view('admin.pages.material.required_material');
    }
);
Route::get('/payment/create', 'AccountController@payeePaymentForm');
Route::post('/debit', 'AccountController@payPayee');
//Route::get(
//    '/payment/list',
//    function () {
//        return view('');
//    }
//);

Route::get('/addFund', 'AccountController@addFundForm');
Route::post('/addFund', 'AccountController@addFund');

Route::get('/credit', 'AccountController@creditForm');
Route::post('/credit', 'AccountController@credit');
Route::get('/demand', 'AccountController@demandForm');
Route::get('/demand-list', 'MaterialHistoryController@demandList');
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


// Route::get('/userType/{userType}', 'UserController@showByUserType')->name('member.list');


CombinedRoute::resourceRoute('/product', 'ProductController', []);

Route::get('/user-create', 'UserController@createForm');
Route::get('/user-edit/{id}', 'UserController@editForm');
CombinedRoute::resourceRoute('user', 'UserController', []);


Route::get('/payee-create', 'PayeeController@createForm');
Route::get('/payee-edit/{id}', 'PayeeController@editForm');
CombinedRoute::resourceRoute('payee', 'PayeeController', []);

Route::get('/category-create', 'CategoryController@createForm');
Route::get('/category-edit/{id}', 'CategoryController@editForm');
CombinedRoute::resourceRoute('category', 'CategoryController', []);

Route::get('/material-create', 'MaterialController@createForm');
Route::get('/material-edit/{id}', 'MaterialController@editForm');
CombinedRoute::resourceRoute('material', 'MaterialController', []);


Route::get('/debit-material', 'MaterialHistoryController@debitForm');
Route::get('/credit-material', 'MaterialHistoryController@creditForm');
Route::get('/demand-material', 'MaterialHistoryController@demandForm');
Route::get('/material-debit-list', 'MaterialHistoryController@debitList');
Route::get('/material-demand-list', 'MaterialHistoryController@demandList');
Route::get('/material-credit-list', 'MaterialHistoryController@creditList');

Route::post('/materialHistoryDebit', 'MaterialHistoryController@debit');
Route::post('/materialHistoryCredit', 'MaterialHistoryController@credit');
Route::post('/materialHistoryDemand', 'MaterialHistoryController@demand');
Route::get('/stock', 'MaterialHistoryController@stock');


Route::get('/emi-create', 'EMIController@createForm');
CombinedRoute::resourceRoute('emi', 'EMIController', []);
CombinedRoute::resourceRoute('account', 'AccountController', []);
Route::get('/accountOverView', 'AccountController@accountOverview');
Route::get('/project-create', 'ProjectController@createForm');
Route::get('/project-edit/{id}', 'ProjectController@editForm');
CombinedRoute::resourceRoute('project', 'ProjectController', []);

Route::get('/payEmployee', 'AccountController@payEmployeeForm');
Route::post('/payEmployee', 'AccountController@payEmployee');
Route::get('/employeePaymentList', 'AccountController@employeePaymentList');

// No need because material's resourceRoute has list with pagination
//Route::get('/materials/list',	'MaterialController@materialList');

//Route::get('/product',	'ProductController@retrieve');
