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


Route::get('/individuals/{id}', function(Individual $id) {
    return new IndividualResource($id);
});

Route::get('/individuals', function() {
    $list = collect(IndividualResource::collection(Individual::all()));
    $sorted = $list->sortByDesc('totdep');
    $sorted->values()->all();
    $individuals = $sorted->take(100);
    return $individuals->values()->all();
});

Route::get('/saccos/{id}', function(Sacco $id) {
    return new SaccoResource($id);
});

Route::get('/saccos', function(){
    return SaccosResource::collection(Sacco::all());
});

Route::get('/transactions/{id}', function(transaction $id) {
    return new TransactionsResource($id);
});

Route::get('/index', function(){
    $transactions = collect(TransactionsResource::collection(Transaction::all()->sortByDesc('id')->take(50)));
    return $transactions;
});

Route::get('/summary', function(){
    return new TransactionsCollection(Transaction::all());
});
