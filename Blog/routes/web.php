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
        Route::get('ex404', 'Admin\ExceptionController@get404')->name('ex404');

        Route::prefix('menu')->group(function () {
            Route::get('list', 'Admin\MenuAdminController@index')->name('listmenu');
            Route::get('change/{id}', 'Admin\MenuAdminController@change');
            Route::get('add', 'Admin\MenuAdminController@getAdd')->name('getadd');
            Route::post('add', 'Admin\MenuAdminController@postAdd');
            Route::get('edit/{id}', 'Admin\MenuAdminController@getEdit');
            Route::post('edit/{id}', 'Admin\MenuAdminController@postEdit');
        });

        Route::prefix('category')->group(function () {
            Route::get('list', 'Admin\CategoryAdminController@index')->name('listcate');
            Route::get('change/{id}', 'Admin\CategoryAdminController@change');
            Route::get('add', 'Admin\CategoryAdminController@getAdd');
            Route::post('add', 'Admin\CategoryAdminController@postAdd');
            Route::post('filterByMenu', 'Admin\CategoryAdminController@filterByMenu');
            Route::get('edit/{id}', 'Admin\CategoryAdminController@getEdit');
            Route::post('edit/{id}', 'Admin\CategoryAdminController@postEdit');
        });

        Route::prefix('level')->group(function () {
            Route::get('list', 'Admin\LevelAdminController@index')->name('listlevel');
            Route::get('change/{id}', 'Admin\LevelAdminController@change');
            Route::get('add', 'Admin\LevelAdminController@getAdd');
            Route::post('add', 'Admin\LevelAdminController@postAdd');
            Route::get('edit/{id}', 'Admin\LevelAdminController@getEdit');
            Route::post('edit/{id}', 'Admin\LevelAdminController@postEdit');
        });

        Route::prefix('staticpages')->group(function () {
            Route::get('list', 'Admin\StaticPagesAdminController@index')->name('liststatic');
            Route::get('delete/{id}', 'Admin\StaticPagesAdminController@delete');
            Route::get('add', 'Admin\StaticPagesAdminController@getAdd');
            Route::post('add', 'Admin\StaticPagesAdminController@postAdd');
            Route::get('edit/{id}', 'Admin\StaticPagesAdminController@getEdit');
            Route::post('edit/{id}', 'Admin\StaticPagesAdminController@postEdit');
            Route::get('detail/{id}', 'Admin\StaticPagesAdminController@detail');
        });

        Route::prefix('posttypes')->group(function () {
            Route::get('list', 'Admin\PostTypeAdminController@index')->name('listposttype');
            Route::get('change/{id}', 'Admin\PostTypeAdminController@change');
            Route::get('add', 'Admin\PostTypeAdminController@getAdd');
            Route::post('add', 'Admin\PostTypeAdminController@postAdd');
            Route::get('edit/{id}', 'Admin\PostTypeAdminController@getEdit');
            Route::post('edit/{id}', 'Admin\PostTypeAdminController@postEdit');
            Route::get('detail/{id}', 'Admin\PostTypeAdminController@detail');
        });

        Route::prefix('feedback')->group(function () {
            Route::get('list', 'Admin\FeeBackController@index')->name('listfeedback');
            Route::get('detail/{id}', 'Admin\FeeBackController@detail');
            Route::get('unread', 'Admin\FeeBackController@unread');
            Route::get('fightallread', 'Admin\FeeBackController@fightallread');
            Route::get('delete/{id}', 'Admin\FeeBackController@delete');
        });

        Route::prefix('post')->group(function () {
            Route::get('list', 'Admin\PostAdminController@index')->name('listpost');
            Route::get('add', 'Admin\PostAdminController@getAdd');
            Route::post('add', 'Admin\PostAdminController@postAdd');
            Route::get('change/{id}', 'Admin\PostAdminController@change');
            Route::get('detail/{slug}', 'Admin\PostAdminController@detail');
            Route::get('edit/{slug}', 'Admin\PostAdminController@getEdit');
            Route::post('edit/{slug}', 'Admin\PostAdminController@postEdit');
            Route::post('filterByPost', 'Admin\PostAdminController@filterByPost');
        });

        Route::prefix('user')->group(function () {
            Route::get('list', 'Admin\UserAdminController@index')->name('listuser');
            Route::get('change/{id}', 'Admin\UserAdminController@change');
            Route::get('detail/{id}', 'Admin\UserAdminController@detail');
        });
    });
});

Route::get('/', function() {
    return view('user.home.home');
});