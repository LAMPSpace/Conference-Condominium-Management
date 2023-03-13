<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
        Route::post('/edit/{user}', 'UserController@update')->name('users.update');
    });
});