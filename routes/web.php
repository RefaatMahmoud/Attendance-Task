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


#Home page
Route::get('/', 'Admin\DashboardController@index')->name('home');

#Admin Login
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ], function () {
    Route::get('login', 'SessionController@create')->name('admin.login');
    Route::post('login', 'SessionController@store')->name('admin.store');
    Route::get('logout', 'SessionController@destroy')->name('admin.logout');
}
);

#Dashboard Pages
Route::group(
    [
        'middleware' => 'auth',
    ], function () {
    Route::resource('employees', 'EmployeeController');
}
);




