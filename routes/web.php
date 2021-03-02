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
    Route::get('/',
        function () {
            return view('admin.dashboard');
        }
    );
});
Route::get('/profile',
    function () {
        return view('admin.pages.profile.create');
    }
);
Route::get('/payee/create',
    function () {
        return view('admin.pages.payee.create');
    }
);
Route::get('/payee/list',
    function () {
        return view('admin.pages.payee.index');
    }
);
Route::get('/user/create',
    function () {
        return view('admin.pages.user.create');
    }
);
Route::get('/user/list',
    function () {
        return view('admin.pages.user.index');
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
