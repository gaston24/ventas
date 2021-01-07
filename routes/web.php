<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

Route::get('/', function(){return view('index');})->name('index');

Route::get('/locales',      'VentasController@localesPropios')->name('locales');
Route::get('/localesComp',      'VentasController@localesPropiosComp')->name('localesComp');

Route::get('/franquicias',  'VentasController@localesFranquicias')->name('franquicias');
Route::get('/franquiciasComp',  'VentasController@franquiciasComp')->name('franquiciasComp');

Route::get('/todos',  'VentasController@todos')->name('todos');

