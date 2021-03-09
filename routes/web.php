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
        return view('admin.pages.building_accounts.add_member_payment');
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
Route::get(
    '/payment/create',
    function () {
        return view('admin.pages.payment.create');
    }
);
Route::get(
    '/payment/list',
    function () {
        return view('admin.pages.payment.index');
    }
);
Route::get(
    '/payee/create',
    function () {
        return view('admin.pages.payee.create');
    }
);
Route::get(
    '/payee/list',
    function () {
        return view('admin.pages.payee.index');
    }
);
Route::get(
    '/emi/list',
    function () {
        return view('admin.pages.emi.index');
    }
);
Route::get(
    '/emi/create',
    function () {
        return view('admin.pages.emi.create');
    }
);
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
Route::get('/users/create',	'UserController@createForm');
Route::get('/users/list',	'UserController@userList');

CombinedRoute::resourceRoute('payee', 'PayeeController', []);
CombinedRoute::resourceRoute('material', 'MaterialController', []);
Route::get('/materials/create',	'MaterialController@createForm');
Route::get('/materials/list',	'MaterialController@materialList');

//Route::get('/product',	'ProductController@retrieve');
