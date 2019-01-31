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

Auth::routes();

Route::get('github/facade/{username}', function ($username) {
    return \App\Facades\GithubScore::forUsername($username);
});

Route::get('/github/{username}', function ($username) {
    $githubScore = app(\App\Services\GithubScore::class);

    return $githubScore->forUsername($username);
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('orders', 'OrdersController@index')->name('orders.index');
    Route::get('orders/create', 'OrdersController@create')->name('orders.create');
    Route::post('orders', 'OrdersController@store')->name('orders.store');
    Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');

    Route::get('orders/{order}/products', 'OrderProductsController@create')->name('orders.products.create');
    Route::post('orders/{order}/products', 'OrderProductsController@store')->name('orders.products.store');

    Route::post('orders/{order}/finalize', 'OrderFinalizerController@store')->name('orders.finalize.store');

});
