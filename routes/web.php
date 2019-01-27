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

Route::get('/github/{username}', function ($username, \App\Services\GithubScore $githubScore) {
    return $githubScore->forUsername($username);
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

});
