<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('alogin', 'Admin\LoginAdminController@getLogin')->name('getlogin');
Route::post('alogin', 'Admin\LoginAdminController@postLogin');
Route::get('alogout', 'Admin\LoginAdminController@logOut');

Route::middleware(['AuthLogin'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('home', 'Admin\HomeAdminController@home')->name('homeadmin');

        Route::prefix('menu')->group(function () {
            Route::get('list', 'Admin\MenuAdminController@index')->name('listmenu');
            Route::get('change/{id}', 'Admin\MenuAdminController@change');
        });
    });
});