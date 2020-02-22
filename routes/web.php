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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/export_excel', 'ImportCSVController@export');

Route::get('/import_excel', 'ImportCSVController@import');

Route::post('/importCSV', 'ImportCSVController@importCSV');

Route::get('/individuals', function () {
    return view('individuals');
});
    
Route::get('/saccos', function () {
    return view('saccos');
});

Route::get('/transactions', function () {
    return view('transactions');
});