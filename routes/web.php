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


Route::get('/',
    function () {
        return view('admin.dashboard');
    }
);
Route::get('/login',
    function () {
        return view('admin.layouts.login');
    }
);
Route::get('/form',
    function () {
        return view('admin.pages.blank.form');
    }
);
Route::get('/table',
    function () {
        return view('admin.pages.blank.table');
    }
);

CombinedRoute::resourceRoute('/product', 'ProductController', []);

//Route::get('/product',	'ProductController@retrieve');
