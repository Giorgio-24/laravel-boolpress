<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);


Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    //^Tutte le rotte protette dell'admin.
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
