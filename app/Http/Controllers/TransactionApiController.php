<?php

namespace App\Http\Controllers;

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

class TransactionApiController extends Controller
{
    public function getTop50Transactions()
    {
        $transactions = Transaction::orderBy('id', 'desc')->take(50)->get();
        return response($transactions->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function getTransaction($id)
    {
        if(Transaction::where('id', $id)->exists())
        {
            $transaction = Transaction::where('id', $id)->get();
            return response($transaction->toJson(JSON_PRETTY_PRINT), 200);
        }
        else
        {
            return response()->json([
                "message" => "Transaction not found"
            ], 404);
        }
    }

    public function getSummary()
    {
        $summary = Transaction::all();
        return response($summary->toJson(JSON_PRETTY_PRINT), 200);
    }
}
