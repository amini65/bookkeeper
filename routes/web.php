<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'Auth'] , function (){

    Route::get('/cp/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/cp/login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

//Route::group(['prefix'=>'panel','namespace' => 'Panel','middleware'=>['auth:web']],function (){
Route::group(['prefix'=>'panel','namespace' => 'Panel'],function (){
    Route::get('/dashboard','DashboardController@index')->name('panel.dashboard');

    Route::resource('products','ProductController');
    Route::resource('users','UserController');

});

