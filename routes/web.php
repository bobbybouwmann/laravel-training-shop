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

    Route::get('categories', 'CategoriesController@index')->name('categories.index');
    Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('categories', 'CategoriesController@store')->name('categories.store');
    Route::get('categories/{categoryCached}', 'CategoriesController@show')->name('categories.show');
    Route::get('categories/{categoryCached}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::patch('categories/{categoryCached}', 'CategoriesController@update')->name('categories.update');
    Route::delete('categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');

});
