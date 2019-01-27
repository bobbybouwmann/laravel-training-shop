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

});
