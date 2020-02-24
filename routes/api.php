<?php

use Illuminate\Http\Request;
use App\Http\Resources\IndividualResource;
use App\Http\Resources\IndividualsCollection;
use App\Http\Resources\SaccosResource;
use App\Http\Resources\SaccosCollection;
use App\Http\Resources\TransactionsResource;
use App\Http\Resources\TransactionsCollection;
use App\Individual;
use App\Sacco;
use App\Transaction;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::resource('individuals', 'IndividualsController');
Route::resource('saccos', 'SaccosController');
Route::resource('Transactions', 'TransactionsController');
*/

Route::post('/importCSV', 'ImportCSVController@importCSV');

Route::get('/individuals/{id}', 'IndividualApiController@getIndividual');

Route::get('/individuals', function() {
    $list = collect(IndividualResource::collection(Individual::all()));
    $sorted = $list->sortByDesc('totdep');
    $sorted->values()->all();
    $individuals = $sorted->take(100);
    return $individuals->values()->all();
});

Route::post('/import', 'TransactionsController@store');

Route::get('/saccos/{id}', 'SaccosApiController@getSACCO');

Route::get('/saccos', function(){
    return SaccosResource::collection(Sacco::all());
});

Route::get('/transactions/{id}', 'TransactionApiController@getTransaction');

Route::get('/index', function(){
    $transactions = collect(TransactionsResource::collection(Transaction::orderBy('id', 'desc')->take(50)->get()));
    return $transactions;
});

Route::get('/summary', function(){
    return new TransactionsCollection(Transaction::all());
});
