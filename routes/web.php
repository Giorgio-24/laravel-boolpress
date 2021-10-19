<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
