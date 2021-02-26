<?php

use Illuminate\Support\Facades\DB;

Route::match(['get', 'post'], '/', 'FeedController@index');

Route::match(['get', 'post'], '/admin', 'AdminController@admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'HomeController@index')->name('home');

