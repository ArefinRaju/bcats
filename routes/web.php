<?php

use App\Models\Payee;
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
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('login', 'AuthController@loginPage')->name('login');
    Route::get('register', 'AuthController@registrationPage')->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/dashboard', 'AuthController@dashBoard')->name('dashboard');
    Route::get('/supplier/{id}', 'PayeeController@viewSupplier');
    Route::get('/member/{memberId}', 'UserController@memberDetails');
    Route::get('/member', 'PayeeController@member');
    Route::get('fetch-sub-category-product-info/{id}', 'PayeeController@fetchSubCategory');
    Route::get('/memberSearch', 'PayeeController@memberSearch');
    Route::get('/supplier-search', 'PayeeController@supplierSearch');
    Route::get('/supplierList/{type?}', 'PayeeController@listByType');
    Route::get('/userType/{userType}', 'UserController@showByUserType');
    Route::get('/transaction/{payee_id}', 'AccountController@transactionList');
    Route::get('memberTransactions/', 'AccountController@memberTransactionList');
    Route::get('supplierTransactions/', 'AccountController@supplierTransactionList');
    Route::get('my-transaction', 'AccountController@individualTransactionList');
    Route::get('/invoice/{payee_id}', 'InvoiceController@listByPayee');
    Route::post('/payPayee', 'AccountController@payPayee');
    Route::post('/stock', 'MaterialHistoryController@stock');
    Route::post('/material/current-stock', 'MaterialHistoryController@stock');
    Route::get('/material/use-material', 'MaterialHistoryController@usedMaterials');
    Route::get('/payment/create', 'AccountController@payeePaymentForm');
    Route::post('/debit', 'AccountController@payPayee');
    Route::get('/addFund', 'AccountController@addFundForm');
    Route::post('/addFund', 'AccountController@addFund');
    Route::get('/credit', 'AccountController@creditForm');
    Route::post('/credit', 'AccountController@credit');
    Route::get('/credit-list', 'AccountController@creditList');
    Route::get('/demand', 'AccountController@demandForm');
    Route::get('/demand-list', 'MaterialHistoryController@demandList');
    Route::post('/demand', 'AccountController@demand');
    CombinedRoute::resourceRoute('/product', 'ProductController', []);
    Route::get('/user-create', 'UserController@createForm');
    Route::get('/user-edit/{id}', 'UserController@editForm');
    CombinedRoute::resourceRoute('user', 'UserController', []);
    Route::post('/user-details-ajax', 'UserController@getUserDataByAjax');
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
    Route::get(
        '/profile',
        function () {
            return view('admin.pages.profile.create');
        }
    );
});

Route::middleware(['employee'])->group(function () {
    Route::get('/test', 'AuthController@dashBoard');
});


Route::get('/supplier/{id}', 'PayeeController@viewSupplier');
Route::get('/member/{memberId}', 'UserController@memberDetails');
Route::get('/member', 'PayeeController@member');
Route::get('fetch-sub-category-product-info/{id}', 'PayeeController@fetchSubCategory');
Route::get('/memberSearch', 'PayeeController@memberSearch');
Route::get('/payee-search', 'PayeeController@supplierSearch');
Route::get('/supplierList/{type?}', 'PayeeController@listByType');
Route::get('/userType/{userType}', 'UserController@showByUserType');
Route::get('/transaction/{payee_id}', 'AccountController@transactionList');
Route::get('memberTransactions/', 'AccountController@memberTransactionList');
Route::get('supplierTransactions/', 'AccountController@supplierTransactionList');
Route::get('my-transaction', 'AccountController@individualTransactionList');
Route::get('/invoice/{payee_id}', 'InvoiceController@listByPayee');
Route::get(
    '/profile',
    function () {
        return view('admin.pages.profile.create');
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
    '/payee',
    function () {
        $payees = Payee::all();
        return view('admin.pages.building_accounts.add_member_payment', compact('payees'));
    }
);


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
Route::get(
    '/material/required-material',
    function () {
        return view('admin.pages.material.required_material');
    }
);
//Route::get(
//    '/payment/list',
//    function () {
//        return view('');
//    }
//);


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

// No need because material's resourceRoute has list with pagination
//Route::get('/materials/list',	'MaterialController@materialList');

//Route::get('/product',	'ProductController@retrieve');



//ALL frontend route here....
Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/privacy/policy', 'FrontendController@privacyPolicy')->name('privacy.policy');

// For blog details pages..
Route::get('/blog/details', 'FrontendController@blogDetails')->name('blog.details');
Route::get('/blog/details1', 'FrontendController@blogDetails1')->name('blog.details1');
Route::get('/blog/details2', 'FrontendController@blogDetails2')->name('blog.details2');
Route::get('/blog/details3', 'FrontendController@blogDetails3')->name('blog.details3');
Route::get('blog/details4', [FrontendController::class, 'blogDetails4'])->name('blog.details4');
Route::get('blog/details5', [FrontendController::class, 'blogDetails5'])->name('blog.details5');