<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'api'], function () {
    Route::prefix('api/users')->group(function () {
        Route::get('/datatable', 'UserController@datatable')->name('users.api.datatables');
    });
});